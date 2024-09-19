<x-layouts.app>
    {{-- @extends('components.layouts.app') --}}

    @section('title', 'Profile')

		<!-- Main Wrapper -->

			<!-- Page Wrapper -->
            <div class="page-wrapper">
				<!-- Page Content -->
                <div class="content">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Notifications</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('')}}/index">Dashboard</a></li>
									<li class="breadcrumb-item active">Notifications</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-md-12">
							<div class="activity">
								<div class="activity-box">
									<ul class="activity-list">
                                        @foreach (auth()->user()->notifications as $key => $item)

										<li id="notification_{{ $item->id }}" style="position: relative;">
                                            <a href="" style="position: absolute; right: 10px; z-index: 2;"
                                                onclick="event.preventDefault(); delete_notification('{{ $item->id }}');">
                                                <i class="fa fa-close text-danger"></i></a>
											<div class="activity-user">
												<a href="{{url('')}}/profile" title="" data-toggle="tooltip" class="avatar">
													{{-- <img src="assets/img/profiles/avatar-01.jpg" alt=""> --}}
                                                    <img src="{{ isset($item->data['image']) ? asset("storage/{$item->data['image']}") : asset('assets/img/noimg.png') }}" alt="" style="height:35px;">
												</a>
											</div>
											<div class="activity-content">
												<div class="timeline-content">
                                                    <p class="mb-1 "><b style="color:black">{!! $item->data['title'] !!}</b></p>
													{!! $item->data['message'] !!}
													<span class="time">{{ $item->created_at }}</span>
												</div>
											</div>
										</li>
                                        @endforeach

                                        {{-- <li>
											<div class="activity-user">
												<a href="profile.html" title="" data-toggle="tooltip" class="avatar" data-original-title="Lesley Grauer">
													<img src="assets/img/profiles/avatar-01.jpg" alt="">
												</a>
											</div>
											<div class="activity-content">
												<div class="timeline-content">
													<a href="profile.html" class="name">Lesley Grauer</a> added new task <a href="#">Hospital Administration</a>
													<span class="time">4 mins ago</span>
												</div>
											</div>
										</li> --}}

									</ul>
								</div>
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->

            </div>
			<!-- /Page Wrapper -->
            <script>
                function delete_notification(id) {
                        let data = {
                            _token: "{{ csrf_token() }}",
                            _method:"delete",
                        }
                        const response = fetch(`notifications/${id}`, {
                            method: "post",
                            headers: {
                                "Content-Type": "application/json",
                            },
                            body: JSON.stringify(data),
                        })
                        .then((response) => response.json())
                        .then((data) => {
                            // console.log(data);
                            document.getElementById(`notification_${id}`).style.display = 'none';
                            document.getElementById('no-notification').innerHTML -= 1;
                            toastMixin.fire({
                                showClass: true,
                                icon: 'success',
                                title: data.message,
                            });
                        })
                }
            </script>
    </x-layouts.app>
