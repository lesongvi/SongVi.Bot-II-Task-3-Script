<?php
function TranslateCommon ($text) {
    $text = preg_replace("/\{\{\s*[Tt]ham\s*_\s*[Kk]hảo/i", "{{tham khảo", $text);
    $text = preg_replace("/\[\[[Cc]ategory\s*:/i", "[[Thể loại:", $text);
    $text = preg_replace("/\{\{[Cc]ite book/i", "{{chú thích sách", $text);
    $text = preg_replace("/\{\{[Cc]ite web/i", "{{chú thích web", $text);
    $text = preg_replace("/\{\{[Cc]ite news/i", "{{chú thích báo", $text);
    $text = preg_replace("/\{\{[Cc]ite journal/i", "{{chú thích tạp chí", $text);
    $text = preg_replace("/\{\{[Cc]ite iucn/i", "{{chú thích IUCN", $text);
    $text = preg_replace("/\{\{[Cc]ite doi/i", "{{chú thích DOI", $text);
    $text = preg_replace("/\{\{[Cc]ite tweet/i", "{{chú thích tweet", $text);
    $text = preg_replace("/\{\{[Rr]eflist/i", "{{tham khảo", $text);
    $text = preg_replace("/<[Rr]eferences\s*\/>/i", "{{tham khảo}}", $text);
    $text = preg_replace("/\[\[[Ff]ile\s*:/i", "[[Tập tin:", $text);
    $text = preg_replace("/\[\[[Ii]mage\s*:/i", "[[Hình:", $text);
    $text = preg_replace("/\{\{[Tt]axobox/i", "{{Bảng phân loại", $text);
    $text = preg_replace("/\{\{[Cc]ommonscat-inline/i", "{{Thể loại Commons nội dòng", $text);
    $text = preg_replace("/\{\{[Cc]ommons category-inline/i", "{{Thể loại Commons nội dòng", $text);
    $text = preg_replace("/\{\{[Ee]ikispecies-inline/i", "{{Wikispecies nội dòng", $text);
    $text = preg_replace("/\{\{[Cc]ommons category/i", "{{Thể loại Commons", $text);
    $text = preg_replace("/\{\{[Cc]ommons\s*cat/i", "{{Thể loại Commons", $text);
    
    $text = preg_replace("/==\s*[Ee]xternal\s*links\s*==/i", "== Liên kết ngoài ==", $text);
    $text = preg_replace("/==\s*[Rr]eferences\s*==/i", "== Tham khảo ==", $text);
    $text = preg_replace("/==\s*[Ss]ee\s*also\s*==/i", "== Xem thêm ==", $text);
    $text = preg_replace("/==\s*[Ff]urther\s*reading\s*==/i", "== Đọc thêm ==", $text);
    $text = preg_replace("/==\s*Notes\s*==/i", "== Ghi chú ==", $text);
    $text = preg_replace("/accessdate\s*=/i", "access-date =", $text);
    
    // lặp 2 lần Thể loại: do công cụ Content Translation gây ra
    $text = preg_replace("/\[\[\s*Thể\s*loại\s*:\s*Category\s*:/i", "[[Thể loại:", $text);
    $text = preg_replace("/\[\[\s*Thể\s*loại\s*:\s*Thể\s*loại\s*:/i", "[[Thể loại:", $text);
    
    $text = preg_replace("/\. Retrieved on/i", ". Truy cập", $text);
    $text = preg_replace("/\. Retrieved/i", ". Truy cập", $text);
    $text = preg_replace("/\. Accessed/i", ". Truy cập", $text);
    $text = preg_replace("/\:Living people\]\]/i", ":Nhân vật còn sống\]\]", $text);
    
    $text = preg_replace("/\|\s*trans_title\s*=/i", "|trans-title=", $text);
    $text = preg_replace("/\|\s*trans_chapter\s*=/i", "|trans-chapter=", $text);
    $text = preg_replace("/\|\s*dead-url\s*=\s*yes/i", "|url-status=dead", $text);
    $text = preg_replace("/\|\s*dead-url\s*=\s*no/i", "|url-status=live", $text);
    $text = preg_replace("/\|\s*dead-url\s*=/i", "|url-status=", $text);
    $text = preg_replace("/\|\s*subscription\s*=\s*yes/i", "|url-access=subscription", $text);
    $text = preg_replace("/\|\s*registration\s*=\s*yes/i", "|url-access=registration", $text);
    
    // Bỏ tham số coauthor trống (lỗi gây ra ở bản mẫu CS1)
    $text = preg_replace("/\|\s*coauthor\s*=\s*\|/i", "|", $text);
    $text = preg_replace("/\|\s*coauthors\s*=\s*\|/i", "|", $text);
    
    return $text;
}