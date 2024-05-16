<!-- Modal -->
<div class="modal fade" id="docCreateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Autofill
                    </button>
                    <div class="dropdown-content" aria-labelledby="dropdownMenuButton">
                        <input type="text" id="searchInput" onkeyup="filterDropdown()" placeholder="Search...">
                        <!-- Add more options here if needed -->
                        <a class="dropdown-item" href="#" onclick="loadDetails('QP01')">Load QP01</a>
                        <a class="dropdown-item" href="#" onclick="loadDetails('QP02')">Load QP02</a>
                        
                    </div>
                </div>
                <h5 class="modal-title" id="exampleModalLabel">Create New Document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ url('document') }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-2">
                            <label>Doc Ref. Code *</label><br>
                            <input type="text" name="doc_ref_code" id="doc_ref_code" class="form-control" required></br>
                        </div>
                        <div class="col-md-6">
                            <label>Document Title *</label><br>
                            <input type="text" name="doc_title" id="doc_title" class="form-control" required></br>
                        </div>
                        <!-- <div class="col-md-2">
          <label>DMT Incharged *</label><br>
          <input type="text" name="dmt_incharged" id="dmt_incharged" class="form-control"></br>
        </div> -->
                        <div class="col-md-2">
                            <label>Division *</label><br>
                            <select name="division" id="division" class="form-control" required></br>
                                <option value="N/A">N/A</option>
                                <option value="AFD">AFD</option>
                                <option value="ORD">ORD</option>
                                <option value="TOD">TOD</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Process Owner *</label><br>
                            <input type="text" name="process_owner" id="process_owner" class="form-control" required></br>
                        </div><br>
                        <div class="col-md-2">
                            <label>Status *</label><br>
                            <input type="text" name="status" id="status" value="Active" class="form-control" disabled required></br>
                        </div>
                        <div class="col-md-4">
                            <label>Document Type *</label><br>
                            <select name="doc_type" id="doc_type" class="form-control" required></br>
                                <option value="Quality Manual">Quality Manual</option>
                                <option value="Quality Procedure">Quality Procedure</option>
                                <option value="Quality Procedure Form">Quality Procedure Form</option>
                                <option value="Quality Policy">Quality Policy</option>
                                <option value="Operations Manual">Operations Manual</option>
                                <option value="Procedure Manual">Procedure Manual</option>
                                <option value="Special Order">Special Order</option>
                                <option value="Travel Order">Travel Order</option>
                                <option value="Memorandum">Memorandum</option>
                                <option value="Corrective Action Request Form">Corrective Action Request Form</option>
                                <option value="Form/Template">Form/Template</option>
                                <option value="Resolution">Resolution</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Request Type *</label><br>
                            <input type="text" name="request_type" id="request_type" class="form-control" required></br>
                        </div>
                        <div class="col-md-2">
                            <label>Request Reason *</label><br>
                            <input type="text" name="request_reason" id="request_reason" class="form-control" required></br>
                        </div>
                        <div class="col-md-2">
                            <label>Requester *</label><br>
                            <input type="text" name="requester" id="requester" class="form-control" required></br>
                        </div>
                        <div class="col-md-2">
                            <label>Request Date *</label><br>
                            <input type="date" name="request_date" id="request_date" class="form-control" required></br>
                        </div>
                        <div class="col-md-2">
                            <label>Revision Number *</label><br>
                            <input type="text" name="revision_num" id="revision_num" value="0" class="form-control" disabled required></br>
                        </div>
                        <div class="col-md-2">
                            <label>Effectivity Date *</label><br>
                            <input type="date" name="effectivity_date" id="effectivity_date" class="form-control" required></br>
                        </div>
                        <div class="col-md-4">
                            <label>File *</label><br>
                            <input type="file" name="file" id="file" class="form-control" required></br>
                        </div>
                    </div>
                    <input type="submit" value="Save" class="btn btn-success">
                </form>

            </div>
            <div class="modal-footer">


                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

</div>
<style>
    #searchInput {
        margin-bottom: 5px;
        padding: 5px;
        width: 100%;
        box-sizing: border-box;
    }

    .dropdown-content.dropdown-menu.dropdown-menu-right {
        left: auto;
        right: 0;
    }

    .dropdown {
        position: relative;
        display: inline-block;
        margin-right: 30px;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 200px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        max-height: 200px;
        overflow-y: auto;

    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown-item {
        display: block;
        margin-bottom: 5px;
        /* Adjust spacing between items */
    }

    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }
</style>
<script>
    function filterDropdown() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById('searchInput');
        filter = input.value.toUpperCase();
        div = document.getElementsByClassName('dropdown-content')[0];
        a = div.getElementsByTagName('a');
        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = '';
            } else {
                a[i].style.display = 'none';
            }
        }
    }



    function loadDetails(option) {
        if (option === 'QP01') {
            // Used to automatically fill up the fields
            var details = {
                doc_ref_code: 'QP01',
                doc_title: 'Risk and Opportunity Management',
                division: 'AFD',
                process_owner: 'QMS Lead/Rep',
                doc_type: 'Quality Procedure',
                request_type: 'Online',
                requester: 'Juan Dela Cruz',
                request_date: '2024-05-16',

            };

            // Fill form fields with details
            $('#docCreateModal #doc_ref_code').val(details.doc_ref_code);
            $('#docCreateModal #doc_title').val(details.doc_title);
            $('#docCreateModal #division').val(details.division);
            $('#docCreateModal #process_owner').val(details.process_owner);
            $('#docCreateModal #doc_type').val(details.doc_type);
            $('#docCreateModal #request_type').val(details.request_type);
            $('#docCreateModal #requester').val(details.requester);
            $('#docCreateModal #request_date').val(details.request_date);

        }
        else if (option === 'QP02') {
            // Used to automatically fill up the fields
            var details = {
                doc_ref_code: 'QP02',
                doc_title: 'Control of Documented Information and Records',
                division: 'N/A',
                process_owner: 'Doc Mngt Team',
                doc_type: 'Quality Procedure',
                request_type: 'Online',
                requester: 'Juan Dela Cruz',
                request_date: '2024-05-16',

            };

            // Fill form fields with details
            $('#docCreateModal #doc_ref_code').val(details.doc_ref_code);
            $('#docCreateModal #doc_title').val(details.doc_title);
            $('#docCreateModal #division').val(details.division);
            $('#docCreateModal #process_owner').val(details.process_owner);
            $('#docCreateModal #doc_type').val(details.doc_type);
            $('#docCreateModal #request_type').val(details.request_type);
            $('#docCreateModal #requester').val(details.requester);
            $('#docCreateModal #request_date').val(details.request_date);

        }
        
        // Add more cases for other options if needed
    }
</script>