<button type="button" class="btn btn-info hover-scale" data-bs-toggle="modal"
        data-bs-target="#kt_modal_master_category_add">
    <!--begin::Svg Icon-->
    <span class="svg-icon svg-icon-2">
        <i class="fa-solid fa-plus fs-2"></i>
    </span>
    <!--end::Svg Icon-->
    Add Master Category
</button>

<div class="modal fade" tabindex="-1" id="kt_modal_master_category_add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Create Master Category</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-info ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-1"><i class="fa-solid fa-xmark text-info"></i></span>
                </div>
                <!--end::Close-->
            </div>

            <form role="form" method="POST" action="{{ route('master-categories.store') }}">
                @csrf
                <div class="modal-body">

                    <div class="row mt-4">
                        {{--Name--}}
                        <div class="col-12 mb-6">
                            <label for="name" class="required form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Name" required
                                   value="{{ old('name') }}"
                            />
                            @error('name')
                            <span class="text-danger m-0 p-0" role="alert">{{$errors->first('name')}}</span>
                            @enderror
                        </div>

                        {{--Status--}}
                        <div class="col-sm-12 mb-6">
                            <label for="status" class="required form-label">Select a status</label>
                            <select id="status" name="status" class="form-select" aria-label="Select status" required>
                                <option disabled>Select a Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            @error('status')
                            <span class="text-danger m-0 p-0" role="alert">{{$errors->first('status')}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

