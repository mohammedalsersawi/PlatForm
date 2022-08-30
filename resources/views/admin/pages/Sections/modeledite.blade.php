  <!--تعديل قسم جديد -->
  <div class="modal fade" id="edit{{ $list_Sections->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                      تعديل مادة
                  </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">

                  <form action="{{ route('Sections.update', 'test') }}" method="POST">
                      {{ method_field('patch') }}
                      {{ csrf_field() }}
                      <input id="id" type="hidden" name="id" class="form-control"
                          value="{{ $list_Sections->id }}">

                      <div class="row">
                          <div class="col">
                              <select type="text" name="Grade_id" class="form-control"
                                  onchange="console.log($(this).val())">
                                  <option value="{{ $Grade->id }}">
                                      {{ $Grade->Name }}
                                  </option>
                                  @foreach ($list_Grades as $list_Grade)
                                      <option value="{{ $list_Grade->id }}">
                                          {{ $list_Grade->Name }}
                                      </option>
                                  @endforeach
                              </select>
                          </div>

                          <div class="col">
                              <select type="text" name="Class_id" class="form-control">
                                  <option value="{{ $list_Sections->My_classs->id }}">
                                      {{ $list_Sections->My_classs->Name_Class }}
                                  </option>
                              </select>
                          </div>

                      </div>
                      <br>


                      <div class="row">
                          <div class="col">
                              <select type="text" name="Name_Material" class="form-control"
                                  onchange="console.log($(this).val())">
                                  @foreach ($Materials as $Material)
                                      <option value="{{ $Material->Name }}">
                                          {{ $Material->Name }}
                                      </option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <br>


                      <div class="form-check">

                          @if ($list_Sections->Status === 1)
                              <input type="checkbox" checked class="form-check-input" name="Status" id="exampleCheck1">
                          @else
                              <input type="checkbox" class="form-check-input" name="Status" id="exampleCheck1">
                          @endif
                          <label class="form-check-label" for="exampleCheck1">الحالة</label>
                      </div>

              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                  <button type="submit" class="btn btn-danger">تاكيد</button>
              </div>
              </form>
          </div>
      </div>
  </div>
