<!-- Button trigger modal-->
@if(count($baocao) > 0)
<form action="{{ route('report') }}" method="get" style="display: inline-block; margin-left: 10px;">
  <a href="{{ route('report') }}" class="btn btn-primary" data-toggle="modal" data-target="#modalCart"><i class="fa-solid fa-bell fa-shake fa-2xl" style="color: #fff700;"></i> Báo cáo</a>
</form>
@else
<form action="{{ route('report') }}" method="get" style="display: inline-block; margin-left: 10px;">
  <a href="{{ route('report') }}" class="btn btn-primary" data-toggle="modal" data-target="#modalCart"><i class="fa-solid fa-check fa-fade fa-2xl" style="color: #11ff00;"></i> Báo cáo </a>
</form>
@endif

<!-- Modal: modalCart -->
<div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><i class="fa-solid fa-user fa-bounce" style="color: #4400ff;"></i> Phản hồi của người dùng</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">

        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Tên phim</th>
              <th>Người dùng </th>
              <th>Nội dung</th>
              <th>Remove</th>
            </tr>
          </thead>
          <tbody>
            @foreach($baocao as $rp)
            <tr>
              <th scope="row">1</th>
              <td>{{ $rp->name_movie }}</td>
              <td>{{ $rp->name_customer }}</td>
              <td>{{ $rp->content }}</td>
              {{-- <a href="{{ route('delete.report', ['id' => $rp->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa báo cáo này không?')">Xóa Báo Cáo</a> --}}
              <td>                                       </form>
                <form action="{{ route('delete.report', ['id' => $rp->id]) }}" method="get" style="display: inline-block; margin-left: 10px;">
                 <button type="submit" class="btn btn-primary">Xóa</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal: modalCart -->

