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
                    <form action="{{ route('lesson.update', 'test') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input id="id" type="hidden" name="id" class="form-control"
                            value="{{ $lesson->id }}">
                        <div class="row">
                            <div class="col">
                                <label for="">رقم الدرس</label>
                                <select type="text" name="number_lesson" class="form-control">
                                    @foreach ($numberlessons as $numberlesson)
                                        <option value="{{ $numberlesson->id }}"> {{ $numberlesson->number }} </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col">
                                <label for="">المادة</label>
                                <select type="text" name="section_id" class="form-control">
                                    <option value="{{ $lesson->section->id }}"> {{ $lesson->section->name }}</option>
                                    @foreach ($Sections as $Section)
                                        <option value="{{ $Section->id }}"> {{ $Section->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label for="">الوحدة</label>
                                <select type="text" name="name_Unit" class="form-control">
                                    <option value="{{ $lesson->name_Unit }}"> {{ $lesson->name_Unit }}</option>
                                    @foreach ($Units as $Unit)
                                        <option value="{{ $Unit->name }}"> {{ $Unit->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="">الصف</label>
                                <select type="text" name="clases_id" class="form-control">
                                    <option value="{{ $lesson->clasess->id }}">{{ $lesson->clasess->name }}</option>
                                    @foreach ($clasess as $clases)
                                        <option value="{{ $clases->id }}"> {{ $clases->name }} </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">عنوان الدرس</label>
                                <input type="text" name="name_lesson" class="form-control"  value="{{ $lesson->name_lesson }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">رابط الكويز</label>
                                <input type="text" name="testlinke" class="form-control" value="{{ $lesson->testlinke }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="">المذكرة</label>
                                <input type="file" name="not" class="form-control">
                            </div>

                            <div class="col">
                                <label for="">حل المذكرة</label>
                                <input type="file" name="not_solve" class="form-control">
                            </div>

                        <div class="col">
                            <label for="">الفيديو التعلمي</label>
                            <input type="file" name="video" class="form-control">
                        </div>
                        </div>
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
