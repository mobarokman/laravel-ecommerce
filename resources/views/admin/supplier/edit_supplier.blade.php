                       <!-- ============================================================== -->
                       <!--add modal  -->
                       <!-- ============================================================== -->
                       <!-- Modal -->

                       <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Edit Supplier</h5>
                           <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </a>
                       </div>
                       <div class="modal-body">
                           <form action="{{route('admin.supplier.update', $supplier->supplier_id)}}" method="post"
                               id="editSupplierForm">
                               @csrf
                               @method('PUT')
                               <div class="row">
                                   <div class="form-group col-md-6">
                                       <label for="inputText3" class="col-form-label">Company/Supplier Name <span
                                               class="text-danger">*</span> </label>
                                       <input name="company_name" id="inputText3" type="text" class="form-control"
                                           placeholder="Enter tag name" value="{{$supplier->company_name}}">
                                       <span id="error-company_name" class="invalid-feedback"></span>
                                   </div>

                                   <div class="form-group col-md-6">
                                       <label for="inputText3" class="col-form-label">Contact Name</label>
                                       <input name="contact_name" id="inputText3" type="text" class="form-control"
                                           placeholder="Enter tag name" value="{{$supplier->contact_name}}">
                                       <span id="error-contact_name" class="invalid-feedback"></span>
                                   </div>
                               </div>

                               <div class="row">
                                   <div class="form-group col-md-4">
                                       <label for="inputText3" class="col-form-label">Email <span
                                               class="text-danger">*</span> </label>
                                       <input name="email" id="inputText3" type="text" class="form-control"
                                           placeholder="Enter tag name" value="{{$supplier->email}}">
                                       <span id="error-email" class="invalid-feedback"></span>
                                   </div>
                                   <div class="form-group col-md-4">
                                       <label for="inputText3" class="col-form-label">Phone <span
                                               class="text-danger">*</span> </label>
                                       <input name="phone" id="inputText3" type="text" class="form-control"
                                           placeholder="Enter tag name" value="{{$supplier->phone}}">
                                       <span id="error-phone" class="invalid-feedback"></span>
                                   </div>
                                   <div class="form-group col-md-4">
                                       <label for="inputText3" class="col-form-label">Fax</label>
                                       <input name="fax" id="inputText3" type="text" class="form-control"
                                           placeholder="Enter tag name" value="{{$supplier->fax}}">
                                       <span id="error-fax" class="invalid-feedback"></span>
                                   </div>
                               </div>



                               <div class="row">
                                   <div class="form-group col-md-4">
                                       <label for="exampleFormControlTextarea1">Address <span
                                               class="text-danger">*</span> </label>
                                       <textarea name="address" class="form-control"
                                           id="exampleFormControlTextarea1 description" rows="3"
                                           placeholder="Write Short Description"> {{$supplier->address}} </textarea>
                                       <span id="error-address" class="invalid-feedback"></span>
                                   </div>

                                   <div class="form-group col-md-8">
                                       <label for="exampleFormControlTextarea2">Short Description</label>
                                       <textarea name="description" class="form-control"
                                           id="exampleFormControlTextarea2 description" rows="3"
                                           placeholder="Write Short Description"> {{$supplier->address}} </textarea>
                                       <span id="error-description" class="invalid-feedback"></span>
                                   </div>
                               </div>

                               <label class="custom-control custom-checkbox">
                                   <input type="checkbox" class="custom-control-input"><span
                                       class="custom-control-label">Active Status</span>
                               </label>

                               <div class="text-right">
                                   <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                   <button type="submit" class="btn btn-lg btn-info">Submit</button>
                               </div>
                           </form>
                       </div>

                       <!-- ============================================================== -->
                       <!--end add modal  -->
                       <!-- ============================================================== -->
