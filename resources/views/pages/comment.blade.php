{{-- @if(isset($comments) && count($comments) > 0)
<div style="background-color: #fff; padding: 10px;">
   <ul>
       @foreach($comments as $comment)
           <li>
            <span class="bold-text">{{ $comment->name_customer }}:</span> {{ $comment->comment }} <br>
           </li>
       @endforeach
   </ul>
</div>
@else
<p>Chưa có comment nào!</p>
@endif --}}
<style>
  @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);
body {
  background-color: #d32f2f;
  font-family: "Calibri", sans-serif !important;
}
.mt-100 {
  margin-top: 100px;
}
.mb-100 {
  margin-bottom: 100px;
}
.card {
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 0px solid transparent;
  border-radius: 0px;
}
.card-body {
  -webkit-box-flex: 1;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  padding: 1.25rem;
}
.card .card-title {
  position: relative;
  font-weight: 600;
  margin-bottom: 10px;
}
.comment-widgets {
  position: relative;
  margin-bottom: 10px;
}
.comment-widgets .comment-row {
  border-bottom: 1px solid transparent;
  padding: 14px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  margin: 10px 0;
}
.p-2 {
  padding: 0.5rem !important;
}
.comment-text {
  padding-left: 15px;
}
.w-100 {
  width: 100% !important;
}
.m-b-15 {
  margin-bottom: 15px;
}
.btn-sm {
  padding: 0.25rem 0.5rem;
  font-size: 0.76563rem;
  line-height: 1.5;
  border-radius: 1px;
}
.btn-cyan {
  color: #fff;
  background-color: #27a9e3;
  border-color: #27a9e3;
}
.btn-cyan:hover {
  color: #fff;
  background-color: #1a93ca;
  border-color: #198bbe;
}
.comment-widgets .comment-row:hover {
  background: rgba(0, 0, 0, 0.05);

}
.card-body {
  color: beige;
  background-color: rgb(0, 81, 19);
}
.comment-widgets{
  background-color: rgb(171, 255, 162);
}

.d-flex{
  background-color: #ffffff;
}

.comment-text{
  color: rgb(52, 128, 52);
}

.d-flex.flex-row.comment-row.m-t-0{
  background-color: #fffd8f;
}
</style>

<div class="row d-flex justify-content-center mt-100 mb-100">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title" style="color:#ffee00">➖➖➖➖➖➖➖🎆🎇🎆 Bình Luận 🎆🎇🎆➖➖➖➖➖➖➖</h4>
            </div>
            <div class="comment-widgets">               
              @if(isset($comments) && count($comments) > 0)
              <ul>
              @foreach($comments as $i => $comment)
                  <div class="d-flex flex-row comment-row m-t-0">
                    <img src="{{ asset('backend/images/' . ($i + 1) . '.jpg') }}" alt="user" width="50" class="rounded-circle">
                      <div class="comment-text w-100">
                          <h6 class="font-medium">{{ $comment->name_customer }}   ❤️👎🔁</h6> <span class="m-b-15 d-block">{{ $comment->comment }} </span>
                      </div>
                  </div> <!-- Card -->
                  @endforeach
                </ul>
            @else
                    <p>Chưa có bình luận nào.</p>
                @endif
            </div>
        </div>
    </div>




