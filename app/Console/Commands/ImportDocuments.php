<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Document;
use Illuminate\Support\Facades\DB;

class ImportDocuments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-documents {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import documents from a CSV file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filePath = $this->argument('file');

        // Check if file exists
        if (!file_exists($filePath)) {
            $this->error("File not found: $filePath");
            return;
        }

        // Open the CSV file for reading
        $file = fopen($filePath, 'r');

        // Skip the header row
        fgetcsv($file);

        // Read and insert each row of data
        while (($row = fgetcsv($file)) !== false) {
            // Ensure that the row has at least 14 columns
            if (count($row) < 14) {
                $this->error("Invalid row: " . implode(',', $row));
                continue;
            }

            $documentData = [
                'doc_ref_code' => $row[0],
                'doc_title' => $row[1],
                'division' => $row[2],
                'process_owner' => $row[3],
                'status' => $row[4] ?? 'Active', // Default value if not provided
                'doc_type' => $row[5],
                'request_type' => $row[6],
                'request_reason' => $row[7],
                'type_intext' => $row[8],
                'request_date' => $row[9],
                'revision_num' => $row[10],
                'effectivity_date' => $row[11],
                'file' => $row[12],
                'unit' => $row[13], // New field added from CSV
            ];

            // Insert into database
            try {
                Document::create($documentData);
            } catch (\Exception $e) {
                $this->error("Error inserting document: " . $e->getMessage());
            }
        }

        fclose($file);

        $this->info('Documents imported successfully.');
    }
}
