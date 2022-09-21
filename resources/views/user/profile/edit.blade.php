                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form enctype="multipart/form-data" method="POST"
                                    action="{{ route('user.profile.update', Auth::user()->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                            Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            @if (Auth::user()->avatar)
                                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Profile"
                                                    class="rounded-circle" />
                                            @else
                                                <img src="{{ asset('nice') }}/assets/img/profile-img.jpg" alt="Profile"
                                                    class="rounded-circle">
                                            @endif
                                            <div class="col-md-6">
                                                <input id="avatar" type="file" class="form-control mt-3"
                                                    name="avatar">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-lg-3 col-form-label">Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                value="{{ old('name', $user->name) }}">
                                        </div>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="job" type="text"
                                                class="form-control @error('job') is-invalid @enderror" id="Job"
                                                value="{{ old('job', $user->job) }}">
                                        </div>
                                        @error('job')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="address" class="form-control  @error('address') is-invalid @enderror" id="Address"
                                                style="height: 100px">{{ old('address', Auth::user()->address) }}</textarea>
                                        </div>
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="number"
                                                class="form-control  @error('phone') is-invalid @enderror"
                                                id="phone" value="{{ old('phone', $user->phone) }}">
                                        </div>
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="about" class="form-control  @error('about') is-invalid @enderror" id="about"
                                                style="height: 100px">{{ old('about', Auth::user()->about) }}</textarea>
                                        </div>
                                        @error('about')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email"
                                                class="form-control  @error('email') is-invalid @enderror"
                                                id="Email" value="{{ old('email', $user->email) }}">
                                        </div>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>
