

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  <i class="fa-solid fa-flag fa-fade fa-2xl" style="color: #ff0000;"></i> Báo cáo 
  </button>


  <style>
    .modal-header{
      background: #51181f;
      color: bisque;
      
    }
    .modal-footer{
      background: #51181f;
      color: rgb(19, 7, 64);
    }
    .modal-body{
      background: #f9f797;
    }
    </style>
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">BÁO CÁO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('report.store') }}" method="post">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="noidung">Nội dung:</label>
                    <input type="hidden" name="id_movie" value="{{ $movie->id }}">
                    <input type="hidden" name="name_movie" value="{{ $movie->title }}">
                    <input type="hidden" name="id_customer" value="{{session('customer_id')}}"> 
                    <input type="hidden" name="name_customer" value="{{session('user')}}"> 
                    <textarea class="form-control" name="content" rows="4" maxlength="60"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">Gửi</button>
            </div>
        </form>
      </div>
    </div>
  </div>