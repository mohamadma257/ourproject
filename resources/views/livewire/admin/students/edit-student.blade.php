
<div class="col-lg-3 col-xl-3 col-md-12 col-sm-12">
    <div class="card card-primary ">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <div class="d-flex justify-content-between">
                </div>
            </div>
        </div>

        <div class="card-body">
            <form class="form-horizontal" >
                <div class="form-group d-flex justify-content-between">
                    <input wire:model.defer="state.firstName" type="text" class="form-control rounded-30 mx-1 " id="inputName"
                        placeholder="الاسم الاول">
                    <input wire:model.defer="state.lastName" type="text" class="form-control rounded-30 mx-1 " id="inputName"
                        placeholder="الاسم الاخير">

                </div>
                <div class="form-group ">
                    <input wire:model.defer="state.middleName" type="text" class="form-control rounded-30 @error('middleName')
                    is-invalid
                    @enderror" id="middleName" placeholder="اسم الاب">
                    @error('middleName')
                    <span class="invaild-feedback text-danger tx-12">
                           {{$message}}
                    </span>
                    @enderror
                </div>
                <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">


                            <div class="row mg-t-10">
                                <label class="mg-b-20">الجنس : </label>

                                <div class="col-lg mg-t-20 mg-lg-t-0">
                                    <label class="rdiobox"><input  name="rdio" type="radio" value="ذكر" wire:model.defer="state.gender"> <span> ذكر </span></label>
                                </div>
                                <div class="col-lg mg-t-20 mg-lg-t-0">
                                    <label class="rdiobox"><input  name="rdio" type="radio" value="انثى" wire:model.defer="state.gender"> <span> انثى </span></label>
                                </div>

                    </div>
                </div>

                <div class="row row-sm mg-b-20">
                    <div class="col">
                        <label class="mg-b-10">الجنسية :</label>
                        <div class="col">
                        <select wire:model.defer="state.nationality" class="form-control col select2">
                            <option value="عربي سوري">
                                عربي سوري
                            </option>
                            <option value="فلسطيني">
                                فلسطيني
                            </option>
                            <option value="اردني">
                                اردني
                            </option>
                            <option value="لبناني">
                                لبناني
                            </option>
                            <option value="سعودي">
                                سعودي
                            </option>
                        </select>
                    </div>
                    </div><!-- col-4 -->

                </div>
                <div class="form-group  ">

                    <div class="col-lg-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    تاريخ الميلاد :
                                </div>
                            </div><input wire:model.defer="state.birthday" class="form-control"
                                type="date">
                        </div><!-- input-group -->
                    </div><!-- col-4 -->
                </div>
                <div class="form-group ">

                    <div class="col-lg-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    رقم الهاتف :
                                </div>
                            </div><!-- input-group-prepend -->
                            <input wire:model.defer="state.phone" class="form-control"
                                type="text">
                        </div><!-- input-group -->
                    </div>
                </div>
                @if($photo)
                <div class="mt-1 mb-1 flex ">
                    <img src=" {{ $photo->temporaryUrl()  }}" width="200" class="rounded">
                </div>

                     @endif
                <div class="input-group mb-3">

                    <div class="form-file">
                        <input type="file" class="form-file-input form-control" wire:model ="photo" >
                    </div>
                </div>
            </form>
            <button type="submit" class="btn btn-success rounded-20" wire:click.prevent ="updateStudent" >تعديل</button>
            <button type="submit" class="btn btn-danger rounded-20" wire:click.prevent ="close" >الغاء</button>

        </div>
    </div>
</div>
