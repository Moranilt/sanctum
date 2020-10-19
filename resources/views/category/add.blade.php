<x-master>


    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="section-row">
						<div class="section-title">
							<h2 class="title">Create Category</h2>
						</div>
                        <form action="/category/store" method="post">
                            @csrf
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
                                    <input class="input @error('title')error @enderror" type="text" name="title" placeholder="Title" value="{{old('title')}}">
                                        @error('title')
                                        <span class="error">{{$message}}</span>
                                        @enderror
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
                                    <textarea class="input @error('description')error @enderror" name="description" placeholder="Description">{{old('description')}}</textarea>
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
