    <!-- edite_modal_Grade -->
    <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        تعديل حزمة
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('Package.update', 'test') }}" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" id="id" name="id" value="{{ $item->id }}"
                            class="form-control">

                        <div class="row">
                            <div class="col">
                                <label for="">الصف</label>
                                <select type="text" name="clases_id" class="form-control">
                                    <option value="{{ $item->classes->id }}">{{ $item->classes->name }}</option>
                                    @foreach ($clasess as $clases)
                                        <option value="{{ $clases->id }}"> {{ $clases->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">المادة</label>
                                <select type="text" name="section_id" class="form-control">
                                    <option value="{{ $item->sections->id  }}"> {{$item->sections->name  }}</option>
                                    @foreach ($Sections as $Section)
                                        <option value="{{ $Section->id }}"> {{ $Section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">المادة</label>
                                <select type="text" name="user_id" class="form-control">
                                    <option value="{{ $item->user->id }}">{{ $item->user->name  }}</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"> {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br><br>

                        @if ($item->Status == 1)
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox"  aria-label="Checkbox for following text input"
                                        checked name="Status" >
                                </div>
                            </div>
                            <input type="text" disabled value="الغاء تفعيل" class="form-control"
                            aria-label="Text input with checkbox"  style="background: rgb(192, 39, 39)">
                        </div>
                        @else
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input"
                                        name="Status">
                                </div>
                            </div>
                            <input type="text" disabled value=" تفعيل"  class="form-control"
                                aria-label="Text input with checkbox" style="background: rgb(4, 179, 62)">
                        </div>
                    @endif

                        <br><br>








                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-success">تاكيد</button>
                </div>
                </form>

            </div>
        </div>
    </div>
