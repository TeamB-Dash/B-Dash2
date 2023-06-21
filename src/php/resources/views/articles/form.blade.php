@csrf
<div class="md-form">
  <label>タイトル</label>
  <input type="text" name="title" class="form-control" required value="{{ $article->title ?? old('title') }}">
</div>
<div class="col-sm-10" data-toggle="buttons">
    <span>
        <label class="btn article-category">
            <input type="radio" name="article_category_id" value="1" id="article_category_id1" {{ (isset($article) && $article->article_category_id == 1) ? 'checked' : '' }}>備忘録
        </label>
    </span><span>
        <label class="btn article-category">
            <input type="radio" name="article_category_id" value="2" id="article_category_id2" {{ (isset($article) && $article->article_category_id == 2) ? 'checked' : '' }}>技術共有
        </label>
    </span><span>
        <label class="btn article-category">
            <input type="radio" name="article_category_id" value="3" id="article_category_id3" {{ (isset($article) && $article->article_category_id == 3) ? 'checked' : '' }}>体験共有
        </label>
    </span><span>
        <label class="btn article-category">
            <input type="radio" name="article_category_id" value="4" id="article_category_id4" {{ (isset($article) && $article->article_category_id == 4) ? 'checked' : '' }}>その他
        </label>
    </span>
</div>

{{-- <div class="form-group">
    <label class="control-label col-sm-2" for="article_article_tags">タグ</label>
    <div class="col-sm-10">
      <input id="article_tags_input" type="hidden" name="tags" value="">
      <div id="article_tags" class="tag-list bootstrap-tags bootstrap-3"><div class="tags"></div><input type="text" id="used-technology" class="form-control tags-input input-md" placeholder="例） Java + <Enter>" style="padding-left: 0px; padding-top: 0px; width: 870px;"><ul class="tags-suggestion-list dropdown-menu"></ul></div>
   </div>
  </div> --}}

<div class="form-group">
  <label></label>
  <textarea name="body" required class="form-control" rows="16" placeholder="本文">{{ $article->body ?? old('body') }}</textarea>
</div>