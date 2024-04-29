<h1>Uploaded files</h1>

<table>
    <tr>
        <th>Filename</th>
        <th>Uploaded at</th>
        <th>Download</th>
    </tr>
    @forelse($uploadedFiles as $uploadedFile)
        <tr>
            <td>
                {{ $uploadedFile->original_name }}
            </td>
            <td>
                {{ $uploadedFile->created_at }}
            </td>
            <td>
                <a href="{{ \Illuminate\Support\Facades\Storage::url($uploadedFile) }}" download>
                    download
                </a>
            </td>
        </tr>
    @empty
        <tr>
            <td>No uploads found</td>
        </tr>
    @endforelse
</table>
<a href="{{ route('documents.create') }}">
    Upload a file
</a>