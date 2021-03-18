@extends('admin.index')
@section('title')
    FAQs
@endsection

@section('page-content-name')
    FAQs
@endsection

@section('main-content')

<!-- Small boxes (Stat box) -->
@if (Session::has('faqAdd'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('faqAdd')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>    
@endif
@if (Session::has('faqEdit'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{session('faqEdit')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>    
@endif
@if (Session::has('faqDelete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{session('faqDelete')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>    
@endif

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-10">
                    <h4>FAQs List</h4>
                </div>
                <div class="col-2 text-right">
                    <a href="{{route('faq.add')}}" class="btn btn-primary" role="button"> <i class="fa fa-plus"></i> Add FAQ</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive table-striped">
          <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Title</th>
                <th width="50%">Content</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              @foreach ($faqs as $data)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$data->title}}</td>
                <td>{{$data->content}}</td>
                <td>
                  <div class="row d-flex justify-content-center">
                    <div class="m-3"> <a href="{{route('faq.edit', ['id' => $data->id])}}"><i class="fa fa-pen text-warning" title="edit"></i></a> </div>
                    <div class="m-3"> <a href="{{route('faq.delete', ['id' => $data->id])}}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash text-danger" title="delete"></i></a> </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <div class="d-flex justify-content-end">
            {{ $faqs->links() }}
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

@endsection