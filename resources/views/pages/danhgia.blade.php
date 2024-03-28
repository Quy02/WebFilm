

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  <i class="fa-solid fa-star fa-beat fa-xl "style="color: #FFFF33;"></i> Đánh giá
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
            <form action="{{ route('danhgia.store') }}" method="post">
                @csrf
            <div class="mb-3">
            <input type="hidden" name="id_movie" value="{{ $movie->id }}">
            <input type="hidden" name="id_customer" value="{{session('customer_id')}}"> 
<style>
  select.form-select {
    width: 60%;
    margin: auto;
}

select.form-select option {
     height: 30px; 
     font-size: 16px; 
     text-align: center; 
}

</style>

<select name="diem" class="form-select" multiple aria-label="multiple select example" size="5">
    <option value="1">😢 ⭐</option>
    <option value="2">😟 ⭐⭐</option>
    <option value="3">🙂 ⭐⭐⭐</option>
    <option value="4">😊 ⭐⭐⭐⭐</option>
    <option value="5">😍 ⭐⭐⭐⭐⭐</option>
</select>

        </div>
            <button type="submit" class="btn btn-primary">Gửi</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          </form>
        </div>
      </div>
    </div>
  </div>