@extends('layouts.adminlayout')

@section('content')
	<div class="row">
		<div class="col-md-12">
			{!! Breadcrumbs::render('menuIndex') !!}
		</div>
        <div class="col-md-12">
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Menu</h3>
              <div class="pull-right">

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalFile"><span class="fa fa-plus"></span>Tambah Menu</button>
                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalURL"><span class="fa fa-plus"></span> URL</button> --}}
                
              </div>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      {{-- <th>path</th> --}}
                      <th>Path</th>
                      <th>Nama</th>
                      <th>Detail</th>
                      <th>Hapus</th>
                      <th>Dibuat</th>
                      {{-- <th>Action</th> --}}
                      {{-- <th>Action</th> --}}
                      {{-- <th>Role</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($menus as $menu)
                  	<tr>
                  		<td>{{$menu->id}}</td>
                  		<td id="copytarget">{{$menu->nama}}</td>
                  		<td>
                  			<a href="{{route('admin.menu.subMenu.index', ['menu' => $menu->id])}}" class="btn btn-primary">Detail {{$menu->nama}}</a>
                  		</td>
                      <td>
                        <a data-toggle="modal" data-id="{{$menu->id}}" data-target="#delete" class="tomboldelete btn btn-danger">Hapus {{$menu->nama}}</a>
                      </td>
                      <td>{{$menu->created_at}}</td>
                  	</tr>
                  	@endforeach
                    
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
         
        </div>
        
        <!-- /.box-footer-->
    </div>
    <div class="modal fade" id="myModalFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Tambahkan Menu Baru</h4>
            </div>
            <div class="modal-body">
              <form action="{{route('admin.menu.add')}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input class="form-control"  placeholder="Enter name" name="nama" type="text">
                </div>
                {{csrf_field()}}
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button></form>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form action="{{route('admin.menu.delete')}}" method="POST">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            
          </div>
          <div class="modal-body">
            <div id="delmsg"></div> 
            <input type="hidden" id="id" name="id" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Iya</button>
            {{csrf_field()}}
          </div>
        </form>
        </div>
      </div>
    </div>
@endsection

@section('js')
<script type="text/javascript">
  $(function () {
    $(document).ready(function() {
      $('#example').DataTable( {
        "order": [[ 4, "desc" ]]
      } );;
      $('.tomboldelete').on('click', function(){
        $('#id').val($(this).data('id'));
        var tr = $(this).closest('tr');
        var msg = '';
        $('#copytarget').each(function(index){
            msg = msg + ' ' +tr.find('td').eq(index).html();
          });
        $('#delmsg').html('Apakah anda yakin ingin menghapus<b>' + msg + '</b>?');

      });
    });
  });
</script>
@endsection