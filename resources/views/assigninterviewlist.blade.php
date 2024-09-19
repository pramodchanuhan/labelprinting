<x-layouts.app>
    {{-- @extends('components.layouts.app') --}}

    @section('title', 'My Interviews')

    @section('page-level-style')

    @endsection

    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h3 class="page-title">My Interviews </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}/index">Dashboard</a></li>
                            <li class="breadcrumb-item">My Interviews</li>
                            <!-- <li class="breadcrumb-item active">Aptitude Result</li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Position</th>
                                    <th class="text-center">Stage</th>
                                    <th class="text-center">Status</th>
                                    {{-- <th class="text-center">Assign Interviewer</th> --}}
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($asigned_iafs as $asigned_iaf)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            <a href="{{ url('salarydetailsform') }}?id={{ $asigned_iaf->id }}">
                                                {{ $asigned_iaf->candidateName }}
                                        </td>
                                        <td>{{ $asigned_iaf->phone }}</td>
                                        <td>{{ $asigned_iaf->email }}</td>
                                        <td>{{ $asigned_iaf->position }}</td>
                                        <!-- <td class="text-center">
                                            <div class="dropdown action-label">
                                                <select id="stage_{{ $asigned_iaf->id }}"
                                                    class="form-select btn btn-white btn-sm btn-rounded "
                                                    style="text-align: left;" disabled
                                                    aria-label="Default select example"
                                                    @cannot('iaf asign hr') disabled @endcannot>
                                                    @foreach ($stages as $key => $stage)
                                                        @if (auth()->user()->hasRole('hr|hr manager') ||
                                                                (auth()->user()->can('iaf interview') && ($key == 3 || $key == 4)) ||
                                                                (auth()->user()->hasRole('ceo') && ($key == 5 || $key == 6)))
                                                            <option value="{{ $key }}"
                                                                {{ $asigned_iaf->stage == $key ? 'selected' : '' }}>
                                                                {{ $stage }}</option>
                                                        @endif
                                                    @endforeach
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown action-label">
                                                <select id="status_{{ $asigned_iaf->id }}"
                                                    class="form-select btn btn-white btn-sm btn-rounded "
                                                    aria-label="Default select example" {{-- @cannot('iaf asign hr') disabled @endcannot> --}} disabled>
                                                    @foreach ($status as $key => $value)
                                                        <option value="{{ $key }}"
                                                            {{ $asigned_iaf->status == $key ? 'selected' : '' }}>
                                                            {{ $value }}</option>
                                                    @endforeach

                                                </select>

                                            </div>
                                        </td> -->
                                        <td> {{ $stages->{$asigned_iaf->stage} }}</td>
                                        <td> {{ $status->{$asigned_iaf->status} }}</td>

                                        {{-- <td class="text-center">
                                            <div class="dropdown action-label">

                                                <select id="assignto_{{ $asigned_iaf->id }}"
                                                    class="form-select btn btn-white btn-sm btn-rounded " disabled
                                                    aria-label="Default select example"
                                                    @cannot('iaf access') disabled @endcannot>
                                                    <option value="0"
                                                        {{ $asigned_iaf->r2_asignedto == '0' ? 'selected' : '' }}>
                                                        Not
                                                        asigned</option>
                                                    @foreach ($r2_interviewers as $r2_interviewer)
                                                        <option value="{{ $r2_interviewer->id }}"
                                                            {{ $asigned_iaf->r2_asignedto == $r2_interviewer->id ? 'selected' : '' }}>
                                                            {{ $r2_interviewer->name }}</option>
                                                    @endforeach

                                            </div>
                                        </td> --}}

                                        <td>
                                            <a class="" data-toggle="modal" href=""
                                                onclick="select_interviewmode({{ $asigned_iaf->id }},{{ $asigned_iaf->cur_round }})">
                                                <i class="fa fa-telegram m-r-5 btn btn-info btn-sm   btn-flat"></i>
                                            </a>

                                            <a class="" href=""
                                                onclick="event.preventDefault(); delete_iaf({{ $asigned_iaf->id }});">
                                                <i
                                                    class="fa fa-trash-o m-r-5 btn btn-danger btn-sm delete btn-flat"></i>
                                            </a>
                                            <!--
                                            <a href="#" class="action-icon" data-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fa fa-reorder"></i>
                                                {{-- <i class="material-icons">more_vert</i> --}}
                                            </a> -->
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" data-toggle="modal" href="#"
                                                    {{-- data-target="#select_interviewmode" --}}
                                                    onclick="select_interviewmode({{ $asigned_iaf->id }},{{ $asigned_iaf->cur_round }})">
                                                    <i
                                                        class="fa fa-comment m-r-5 btn btn-info btn-sm btn-flat"></i>Asign</a>
                                                <a class="dropdown-item" {{-- href="{{ url('hrform') }}?id={{ $asigned_iaf->id }}"><i --}}
                                                    href="{{ url('salarydetailsform') }}?id={{ $asigned_iaf->id }}"><i
                                                        class="fa fa-eye m-r-5 btn btn-warning btn-sm edit btn-flat"></i>
                                                    View</a>
                                                <!-- <a class="dropdown-item" href="#"><i class="fa fa-pencil m-r-5 btn btn-success btn-sm edit btn-flat"></i> Edit</a> -->

                                                @can('iaf access')
                                                    <a class="dropdown-item" href=""
                                                        onclick="event.preventDefault(); update_iaf({{ $asigned_iaf->id }},this);"><i
                                                            class="fa fa-edit m-r-5 btn btn-info btn-sm edit btn-flat"></i>
                                                        <span>Edit</span></a>
                                                @endcan

                                                <a class="dropdown-item" href=""
                                                    onclick="event.preventDefault(); delete_iaf({{ $asigned_iaf->id }});"><i
                                                        class="fa fa-trash-o m-r-5 btn btn-danger btn-sm delete btn-flat"></i>
                                                    Delete</a>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                        <form action="{{ url('candidate-list') }}" id="delete_iaf" method="POST">
                            @csrf
                            @method('delete')
                            <input type="hidden" id="delete_iaf_in" name="delete_iaf_in" value="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

    </div>
    <!-- /Page Wrapper -->

    <!-- Interview mode Modal -->
    <div id="select_interviewmode" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Select Mode of Interview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('selectinterviewmode') }}" method="POST">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Mode of Interview<span class="text-danger">*</span></label>
                                <select id="mode" class="select" name="interview_mode"
                                    onchange="handleSourceChange()">
                                    <option>Select Mode</option>
                                    <option value="Telephonic">Telephonic</option>
                                    <option value="Face-to-Face">Face-to-Face</option>
                                    <option value="Link">Zoom Or Google Meet Link</option>
                                </select>
                            </div>
                        </div>


                        <div id="others-textbox" class="col-sm-6" style="display:none;">
                            <div class="form-group">
                                <label class="col-form-label" for="otherSource">Name:</label>
                                <input class="form-control" type="text" id="name" name="interviewer_name">
                            </div>
                        </div>

                        <div id="referral-textbox" class="col-sm-6" style="display:none;">
                            <div class="form-group">
                                <label class="col-form-label" for="otherSource">Link:</label>
                                <input class="form-control" type="text" id="link" name="interview_link">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Interviewer<span class="text-danger">*</span></label>

                                <select id="cur_round_interviewer" class="select" name="assignto">
                                    {{-- <option value="0">
                                    Not asigned</option>
                                    @foreach ($r2_interviewers as $r2_interviewer)
                                        <option value="{{ $r2_interviewer->id }}">{{ $r2_interviewer->name }} => {{$r2_interviewer->employee->designation_name}}</option>
                                    @endforeach --}}
                                </select>

                                {{-- <select id="cur_round_3" class="select d-none" name="assignto">
                                    <option value="0">
                                    Not asigned</option>
                                    @foreach ($r2_interviewers as $r2_interviewer)
                                        <option value="{{ $r2_interviewer->id }}">{{ $r2_interviewer->name }}</option>
                                    @endforeach
                                </select> --}}

                            </div>
                        </div>


                        {{-- <input type="hidden" name="cur_round" value="2"> --}}
                        <input type="hidden" name="iaf_id" id="iaf_id">


                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Interview mode Modal -->

    {{-- @dd($r1_interviewers,$r2_interviewers,$r3_interviewers) --}}
    @section('page-level-script')

        <script>
            let r1_interviewer = `
                <option value="0">Not asigned</option>
                <option value="{{ $r1_interviewers->id }}">{{ ucfirst($r1_interviewers->employee->f_name) . ' ' . ucwords($r1_interviewers->employee->l_name) }} </option>
            `;

            let r2_interviewer = `
                <option value="0">Not asigned</option>
                @foreach ($r2_interviewers as $r2_interviewer)
                    <option value="{{ $r2_interviewer->id }}">{{ ucfirst($r2_interviewer->employee->f_name) . ' ' . ucwords($r2_interviewer->employee->l_name) }} => {{ $r2_interviewer->employee->designation_name }}</option>
                @endforeach
            `;

            let r3_interviewer = `
                <option value="0">Not asigned</option>
                @foreach ($r3_interviewers as $r3_interviewer)
                    <option value="{{ $r3_interviewer->id }}">{{ ucfirst($r3_interviewer->employee->f_name) . ' ' . ucwords($r3_interviewer->employee->l_name) }} => {{ $r3_interviewer->employee->designation_name }}</option>
                @endforeach
            `;

            // console.log(r1_interviewer,r2_interviewer,r3_interviewer,eval('r1_interviewer'));

            function select_interviewmode(iaf_id, cur_round) {
                document.getElementById('iaf_id').value = iaf_id;
                console.log(cur_round);
                if (cur_round >= 3) {
                    return
                }
                document.getElementById('cur_round_interviewer').innerHTML = eval(`r${cur_round + 1}_interviewer`);

                // $('#cur_round_3').next(".select2-container").hide();
                // document.querySelector(`#cur_round_${cur_round}`).nextElementSibling.style.display='none';

                $("#select_interviewmode").modal()
            }




            function handleSourceChange() {
                var sourceSelect = document.getElementById('mode');
                var othersTextbox = document.getElementById('others-textbox');
                var referralTextbox = document.getElementById('referral-textbox');

                if (sourceSelect.value === 'Link') {
                    referralTextbox.style.display = 'block';
                    referralTextbox.setAttribute('required', 'true');

                    othersTextbox.style.display = 'none';
                    othersTextbox.removeAttribute('required');

                } else if (sourceSelect.value === 'Walk-in') {
                    othersTextbox.style.display = 'block';
                    othersTextbox.setAttribute('required', 'true');

                    referralTextbox.style.display = 'none';
                    referralTextbox.removeAttribute('required');
                } else {
                    referralTextbox.style.display = 'none';
                    referralTextbox.removeAttribute('required');

                    othersTextbox.style.display = 'none';
                    othersTextbox.removeAttribute('required');
                }
            }

            function update_iaf(id, e) {
                let stage = document.getElementById(`stage_${id}`);
                let status = document.getElementById(`status_${id}`);

                let stage_val = stage.value
                let status_val = status.value

                // console.log(stage,status_val);
                // status.value="Application rejected"
                // date('d-m-Y', strtotime($user->from_date));

                status.toggleAttribute("disabled");
                stage.toggleAttribute("disabled");
                //   e.closest('.fa-edit')
                let fa_icon = e.querySelector('i');
                let span = e.querySelector('span');

                if (fa_icon.classList.contains('fa-edit')) {
                    fa_icon.classList.remove("fa-edit");
                    fa_icon.classList.add("fa-save");
                    span.innerText = "Save";
                } else {
                    let data = {
                        stage: stage_val,
                        status: status_val,
                        id: id,
                        _token: "{{ csrf_token() }}"
                    }
                    const response = fetch(`candidate-list/${id}`, {
                            method: "post",
                            headers: {
                                "Content-Type": "application/json",
                            },
                            body: JSON.stringify(data),
                        })
                        .then((response) => response.json())
                        .then((data) => {
                            // console.log(data);
                            fa_icon.classList.add("fa-edit");
                            fa_icon.classList.remove("fa-save");
                            span.innerText = "Edit";

                            toastMixin.fire({
                                showClass: true,
                                icon: 'success',
                                title: data.message,
                            });

                            location.reload();
                        })
                    // console.log('updated');
                }

                // console.log(status.value, e, fa_icon);

            }

            function delete_iaf(id) {
                // const response=fetch(`request-tracking-delete?id=${id}`)
                // .then((data)=>{
                //     console.log('deleted');
                // })

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete_iaf_in').value = id;
                        document.getElementById('delete_iaf').submit();

                        //   window.location.href = './'
                        //   location.reload();

                        // Swal.fire({
                        // title: "Deleted!",
                        // text: "Your file has been deleted.",
                        // icon: "success"
                        // });
                    }
                });
            }
        </script>

    @endsection


</x-layouts.app>
