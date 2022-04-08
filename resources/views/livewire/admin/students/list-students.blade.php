@section('css')
    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{ URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
@endsection
<div class="col-xl-12">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Elements</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Breadcrumbs</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" wire:click = "filterGender('ذكر')" class="btn btn-info btn-icon ml-2">ذكر</button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-danger btn-icon ml-2" wire:click = "filterGender('انثى')" >انثى</button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-warning  btn-icon ml-2" wire:click = "filterGender(null)"> الجميع</button>
            </div>
            <div class="mb-3 mb-xl-0">
                <div class="btn-group dropdown">
                    <button type="button" class="btn btn-primary">جميع الطلاب</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
                        <a class="dropdown-item" href="#">السنة الاولى</a>
                        <a class="dropdown-item" href="#">السنة الثانية</a>
                        <a class="dropdown-item" href="#">السنة الثالثة</a>
                        <a class="dropdown-item" href="#">السنة الرابعة</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    <div class="row d-flex">


        @if($updateStu)
        @include('livewire.admin.students.edit-student')
        @else
        @include('livewire.admin.students.create_student')
        @endif
        <div class="col-9">
            <div class="card card-primary ">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex justify-content-between">

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
                        <span class="alert-inner--text">{{ session('message') }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <input type="text"  class="form-control mb-1 border-2" placeholder="البحث"  wire:model="searchTerm"/>
                    <div class="table-responsive">
                        <table class="table table-striped mg-b-0 text-md-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Position</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $stuData)


                                <tr>
                                    <td><img class="rounded-30" width="35" src="{{ asset('images/' . $stuData->image) }}" alt=""></td>

                                    <td ><a href="{{ route('admin.students_show', $stuData->id) }}" wire:click='show_student({{ $stuData->id }})'>{{  $stuData->firstName }}</a></td>
                                    <td>{{  $stuData->lastName }}</td>
                                    <td>{{  $stuData->middleName }}</td>
                                    <td>{{  $stuData->gender }}</td>
                                    <td>{{  $stuData->nationality }}</td>
                                    <td>{{  $stuData->phone }}</td>
                                    <td>{{  $stuData->birthday }}</td>

                                    <td>
                                        <a href="">

                                            <i class="la la-edit text-success" wire:click.prevent = 'edit({{ $stuData }})' style="font-size:24px"></i>
                                        </a>
                                        <a href="">
                                            <i class="la la-trash text-danger" id="#swal-warning" wire:click.prevent='studentRemoval({{ $stuData->id }})' style="font-size:24px" ></i>
                                        </a>


                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="pt-4 pagination pagination-circled mb-0">
                            {{ $students->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @section('js')
        <script>
            $('#swal-warning').click(function () {
		swal({
		  title: "Are you sure?",
		  text: "Your will not be able to recover this imaginary file!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn btn-danger",
		  confirmButtonText: "Yes, delete it!",
		  closeOnConfirm: false
		},
		function(){
		  swal("Deleted!", "Your imaginary file has been deleted.", "success");
		});
	});
        </script>
        <!--Internal  Datepicker js -->
        <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
        <!--Internal  jquery.maskedinput js -->
        <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
        <!--Internal  spectrum-colorpicker js -->
        <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
        <!-- Internal Select2.min js -->
        <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
        <!--Internal Ion.rangeSlider.min js -->
        <script src="{{ URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
        <!--Internal  jquery-simple-datetimepicker js -->
        <script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
        <!-- Ionicons js -->
        <script src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
        <!--Internal  pickerjs js -->
        <script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>
        <!-- Internal form-elements js -->
        <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
        <script src="{{URL::asset('assets/js/form-validation.js')}}"></script>
        <!--Internal  Sweet-Alert js-->
        <script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
        {{-- <script src="{{URL::asset('assets/plugins/sweet-alert/jquery.sweet-alert.js')}}"></script> --}}
        <!-- Sweet-alert js  -->
        <script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/sweet-alert.js')}}"></script>
    @endsection
