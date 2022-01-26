@extends('layouts.app')
@section('body')
<div class="container">
    <button data-bs-toggle="modal" data-bs-target="#modalAdd" type="button" class="btn btn-primary">Primary</button>
    <table class="table">
        <thead class="table-grey">
          <tr>
              <th>PROJECT NAME</th>
              <th>CLIENT</th>
              <th>PROJECT LEADER</th>
              <th>START DATE</th>
              <th>END DATE</th>
              <th>PROGRESS</th>
              <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($projects as $item)
          <tr>
              <th>{{$item->name}}</th>
              <th>{{$item->client}}</th>
              <th>{{$item->leader_name}}</th>
              <th>{{date("j M Y", strtotime($item->start))}}</th>
              <th>{{date("j M Y", strtotime($item->finish))}}</th>
              <th>
                  @if (($item->progress / $item->progress_total) == 1)
                  <div class="progress">
                      <div class="progress-bar bg-success" style="width:{{($item->progress / $item->progress_total)*100}}%" role="progressbar" aria-valuenow="{{($item->progress / $item->progress_total)*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  @else
                  <div class="progress">
                      <div class="progress-bar" style="width:{{($item->progress / $item->progress_total)*100}}%" role="progressbar" aria-valuenow="{{($item->progress / $item->progress_total)*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  @endif
              </th>
              <th>

              </th>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>
  {{-- modal --}}
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddLabel">Add Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('project.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label .text-dark">PROJECT NAME </label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="client" class="col-form-label .text-dark">CLIENT</label>
                        <input class="form-control" type="client" id="client" name="client">
                    </div>
                    <div class="form-group">
                        <label for="picture" class="col-form-label .text-dark">PICTURE </label>
                        <input class="form-control" type="picture" id="picture" name="picture">
                    </div>
                    <div class="form-group">
                        <label for="leader_name" class="col-form-label .text-dark">PROJECT LEADER</label>
                        <input class="form-control" type="text" id="leader_name" name="leader_name">
                    </div>
                    <div class="form-group">
                        <label for="start" class="col-form-label .text-dark">START</label>
                        <input class="form-control" type="date" id="start" name="start">
                    </div>
                    <div class="form-group">
                        <label for="finish" class="col-form-label .text-dark">FINISH</label>
                        <input class="form-control" type="finish" id="finish" name="finish">
                    </div>

                    <button type="submit" id="submit" class="btn btn-primary float-right text-light">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
