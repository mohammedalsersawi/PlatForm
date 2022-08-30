<div class="">
    <!-- edite_modal_Grade -->
    <div class="modal fade" id="edit{{ $lesson->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        تعديل بيانات الدرس
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('lesson.update', 'test') }}" method="POST">
                        @csrf
                        @method('put')
                        <input id="id" type="hidden" name="id" class="form-control"
                            value="{{ $lesson->id }}">
                        <div class="row">
                            <div class="col">
                                <label for="">رقم الدرس</label>
                                <select type="text" name="Number_lesson" class="form-control"
                                    onchange="console.log($(this).val())"> >
                                    <option value="{{ $lesson->Number_lesson }}">
                                        {{ $lesson->Number_lesson }}
                                    </option>
                                </select>
                            </div>


                            <div class="col">
                                <label for="">المادة</label>
                                <select type="text" name="Section_id" class="form-control">
                                    <option value="{{ $lesson->Number_lesson }}">
                                        {{ $lesson->Number_lesson }}
                                    </option>
                                    @foreach ($Sections as $Section)
                                        <option value="{{ $Section->id }}"> {{ $Section->Name_Material }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label for="">الوحدة</label>
                                <select type="text" name="Name_Unit" class="form-control">
                                    <option value="{{ $lesson->Name_Unit }}">
                                        {{ $lesson->Name_Unit }}
                                    </option>
                                    @foreach ($Units as $Unit)
                                        <option value="{{ $Unit->Name }}"> {{ $Unit->Name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <br>

                        <div class="col">
                            <label for="">عنوان الدرس</label>
                            <input type="text" name="Name_lesson" id="" class="form-control"
                                value="{{ $lesson->Name_lesson }}">
                        </div>
                        <br>


                        <div class="row">
                            <div class="col">
                                <label for="">المذكرة</label>
                                <input type="file" name="Not" class="form-control">
                            </div>

                            <div class="col">
                                <label for="">حل المذكرة</label>
                                <input type="file" name="Not_solve" class="form-control">
                            </div>
                        </div>
                        <br>



                        <div class="col">
                            <label for="">الفيديو التعلمي</label>
                            <input type="file" name="video" class="form-control">
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="">رابط الكويز</label>
                                <input type="text" name="Testlinke" id="" class="form-control"
                                    value="{{ $lesson->Testlinke }}">
                            </div>
                        </div>
                        <br>
                        <br><br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلق</button>
                            <button type="submit" class="btn btn-success">تاكيد</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
