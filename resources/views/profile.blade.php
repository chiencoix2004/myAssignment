@extends('client.layouts.default')

@push('css')
    <style>
        .profile {
            background: rgb(99, 39, 120)
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }
    </style>
@endpush
@section('content')
    <br>
    <br>
    <br>
    <br>
    <div class="profile">
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                            width="150px"
                            src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                            class="font-weight-bold">{{ Auth::user()->name }}</span><span
                            class="text-black-50">{{ Auth::user()->email }}</span><span>
                        </span></div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">UserName</label><input type="text"
                                    class="form-control" value="{{ Auth::user()->name }}"></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Email</label><input type="text"
                                    class="form-control" value="{{ Auth::user()->email }}"></div>
                        </div>
                        <div class="row mt-3">
                            @if (Auth::user()->phone == '')
                                <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text"
                                        class="form-control" value="Null"></div>
                            @else
                                <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text"
                                        class="form-control" value="{{ Auth::user()->phone }}"></div>
                            @endif
                            @if (Auth::user()->address == '')
                                <div class="col-md-12"><label class="labels">Address</label><input type="text"
                                        class="form-control" placeholder="enter address line 1" value="Null"></div>
                            @else
                                <div class="col-md-12"><label class="labels">Address</label><input type="text"
                                        class="form-control" placeholder="enter address line 1"
                                        value="{{ Auth::user()->address }}"></div>
                            @endif
                            <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text"
                                    class="form-control" value=""></div>
                        </div>
                        {{-- <div class="row mt-3">
                            <div class="col-md-6"><label class="labels">Country</label><input type="text"
                                    class="form-control" placeholder="country" value=""></div>
                            <div class="col-md-6"><label class="labels">State/Region</label><input type="text"
                                    class="form-control" value="" placeholder="state"></div>
                        </div> --}}
                        <div class="mt-5 text-center"><a class="btn btn-primary profile-button">Update
                                Profile</a></div>
                        <div class="mt-5 text-center"><a class="btn btn-primary profile-button"
                                href="{{ route('logout') }}">
                                Logout</a></div>
                    </div>
                </div>
                {{-- <div class="col-md-4">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center experience"><span>Edit
                                Experience</span><span class="border px-3 p-1 add-experience"><i
                                    class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                        <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text"
                                class="form-control" placeholder="experience" value=""></div>
                        <br>
                        <div class="col-md-12"><label class="labels">Additional Details</label><input type="text"
                                class="form-control" placeholder="additional details" value=""></div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
