@extends("admin.Layout")
@section("do-du-lieu-vao-layout")
<div class="col-md-10 col-xs-offset-1">
	<div class="panel panel-primary">
		<div class="panel-heading">Add edit news</div>
		<div class="panel-body">
			<!-- muon upload duoc file phai co thuoc tinh enctype= "multipart/form-data" -->
			<form method="post" action="" enctype= "multipart/form-data">
			<!-- phai co tag sau thi laravel moi bat duoc du lieu -->
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Tiêu đề</div>
				<div class="col-md-9">
					<input type="text" name="name" class="form-control" value="{{ isset($record->name)?$record->name:'' }}">
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Thuộc danh mục</div>
				<div class="col-md-9">
					<select name="category_id" class="form-control" style="width: 250px;">
						<?php 
							//co the dung full sql
							$categories = DB::select("select * from categories order by id desc");
						 ?>
						 @foreach($categories as $rows)
						<option @if(isset($record->category_id)&&$record->category_id==$rows->id) selected @endif value="{{ $rows->id }}">{{ $rows->name }}</option>
						@endforeach					
					</select>
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Giới thiệu</div>
				<div class="col-md-9">
					<textarea name="description" class="form-control" style="height:250px;">			
						{{ isset($record->description)?$record->description:'' }}
					</textarea>
					<script type="text/javascript">
						CKEDITOR.replace("description");
					</script>
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Chi tiết</div>
				<div class="col-md-9">
					<textarea name="content" class="form-control" style="height:300px;">
						{{ isset($record->content)?$record->content:'' }}
					</textarea>
					<script type="text/javascript">
						CKEDITOR.replace("content");
					</script>
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<input type="checkbox" @if(isset($record->hot)&&$record->hot==1) checked @endif name="hot" id="hot"> <label for="hot">Tin nổi bật</label>
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Ảnh</div>
				<div class="col-md-9">
					<input type="file" name="photo">
				</div>
			</div>
			<!-- end row -->			
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<input type="submit" class="btn btn-primary" value="Process">
				</div>
			</div>
			<!-- end row -->
			</form>
		</div>
	</div>
</div>
@endsection