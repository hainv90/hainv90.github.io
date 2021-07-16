<style>
    list-product .filter .item input,
    list-product .filter .item select {
        width: 350px;
    }
    list-product .filter .item input
    {
      text-transform: capitalize;
      font-family: inherit;
      font-weight: 600;
      border: none;
      height: 35px;
      padding-left: 20px;
      border-radius: 50px;
      font-size: 14px;
      background: #fff;
    }
</style>
<form action="" method="">
  <div class="filter">
      <div class="item">
          <input type="text" name="keyword" placeholder="Nhập tên sản phẩm" value="{{ request('keyword') }}" />
      </div>
      <div class="item">
        
          <select name="categgory_id" @if(isset($categoryId)) disabled @endif>
              <option value=""> Chọn danh mục sản phẩm <option>
              @foreach($categories as $category)
              @php
                  $selected = $category->id == $categoryId ? 'selected' : '';
              @endphp
              <option {{ $selected}} value="{{$category->id}}">{{ $category->name }}</option>
              @endforeach
          </select>
      </div>
      
      <div class="item">
          <button>Tìm kiếm</button>
      </div>
  </div>
</form>