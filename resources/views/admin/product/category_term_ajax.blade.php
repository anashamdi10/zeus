<select class="form-control " name="category_term" id="category_term">
    <option disabled> اختر القسم</option>
    @foreach($categoryterms as $categoryterm)
    <option value="{{ $categoryterm->id }}">{{ $categoryterm->content_en }}</option>
    @endforeach
</select>