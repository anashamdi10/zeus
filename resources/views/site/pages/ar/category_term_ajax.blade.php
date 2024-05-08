<h5 class="section-title position-relative text-uppercase mb-3">
    <span class="pr-3">تصفية حسب الفئة الفرعية</span>
</h5>

@foreach($categoryterms as $categoryterm)
<div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
    <input id="categoryterm" type="radio" name="categoryterm" value="{{ $categoryterm->id }}">
    <label class="custom-control-label" for="category-2">{{ $categoryterm->content_ar }}</label>
</div>
@endforeach