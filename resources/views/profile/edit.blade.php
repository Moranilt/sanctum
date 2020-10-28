<x-master>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="section-row">
						<div class="section-title">
							<h2 class="title">Edit Profile</h2>
						</div>
                        <form action="{{route('user.update', $user->slug)}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
                                    <input class="input @error('name')error @enderror" type="text" name="name" placeholder="name" value="{{$user->name}}">
                                        @error('name')
                                        <span class="error">{{$message}}</span>
                                        @enderror
									</div>
                                </div>
                                <div class="col-md-12">
									<div class="form-group">
                                    <input class="input @error('email')error @enderror" type="email" name="email" placeholder="Email" value="{{$user->email}}">
                                        @error('email')
                                        <span class="error">{{$message}}</span>
                                        @enderror
									</div>
                                </div>
                                <div class="col-md-12">
									<div class="form-group">
                                    <input class="input @error('avatar')error @enderror" type="file" name="avatar">
                                        @error('avatar')
                                        <span class="error">{{$message}}</span>
                                        @enderror
									</div>
                                </div>

                                <div class="col-md-12">
									<div class="form-group">
                                    <input class="input @error('password')error @enderror" type="password" name="password" required autocomplete="new-password" placeholder="password">
                                        @error('password')
                                        <span class="error">{{$message}}</span>
                                        @enderror
									</div>
                                </div>

                                <div class="col-md-12">
									<div class="form-group">
                                    <input class="input @error('password')error @enderror" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="password">

									</div>
                                </div>

                                <div class="col-md-12">
									<div class="form-group">
                                    <input class="input @error('google')error @enderror" type="text" name="facebook" placeholder="Facebook">
                                        @error('facebook')
                                        <span class="error">{{$message}}</span>
                                        @enderror
									</div>
                                </div>

                                <div class="col-md-12">
									<div class="form-group">
                                    <input class="input @error('google')error @enderror" type="text" name="google" placeholder="google">
                                        @error('google')
                                        <span class="error">{{$message}}</span>
                                        @enderror
									</div>
                                </div>

                                <div class="col-md-12">
									<div class="form-group">
                                    <input class="input @error('twitter')error @enderror" type="text" name="twitter" placeholder="twitter">
                                        @error('twitter')
                                        <span class="error">{{$message}}</span>
                                        @enderror
									</div>
                                </div>

                                <div class="col-md-12">
									<div class="form-group">
                                    <input class="input @error('instagram')error @enderror" type="text" name="instagram" placeholder="instagram">
                                        @error('instagram')
                                        <span class="error">{{$message}}</span>
                                        @enderror
									</div>
                                </div>

								<div class="col-md-12">
									<div class="form-group">
                                    <textarea class="input @error('description')error @enderror" name="description" placeholder="Tell us something about yourself!">{{$user->description}}</textarea>
                                        @error('description')
                                        <span class="error">{{$message}}</span>
                                        @enderror
									</div>
									<button class="primary-button">Submit</button>
								</div>
							</div>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
</x-master>
