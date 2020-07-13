// Dom7
var $ = Dom7;

// Theme
var theme = 'auto';
if (document.location.search.indexOf('theme=') >= 0) {
  theme = document.location.search.split('theme=')[1].split('&')[0];
}

function name_to_punjabi(name)
{
  var chapters = new Object();
    chapters['Arithmetic Progressions'] = "5.﻿ ਅੰਕਗਣਿਤਕ ਲੜੀਆਂ";
  ﻿  chapters['Quadratic Equations'] = "4. ਦੋ ਘਾਤੀ ਸਮੀਕਰਨਾਂ";
    chapters['Pair of Linear Equations in Two Variables'] = "3. ﻿ਦੋ ਚਲਾਂ ਵਿੱਚ ਰੇਖੀ ਸਮੀਕਰਨਾਂ ਦੇ ਜੋੜੇ";
    chapters['Real Numbers'] = "1. ਵਾਸਤਵਿਕ ਸੰਖਿਆਵਾਂ";
    chapters['Triangles'] = "6. ﻿ਤ੍ਰਿਭੁਜ";
    chapters['Coordinate Geometry'] = "7. ਨਿਰਦੇਸ਼ ਅੰਕ ਜਿਮਾਇਤੀ";
    chapters['Introduction to Trigonometry'] = "8. ﻿ਤਿਕੋਣਮਿਤਈ";
    chapters['Areas Related to Circles'] = "12.﻿ ਚੱਕਰ ਨਾਲ ਸੰਬੰਧਿਤ ਖੇਤਰਫਲ";
    chapters['Statistics'] = "14.﻿ ਅੰਕੜੇ";
    chapters['Some Applications of Trigonometry'] = "9. ﻿ਤਿਕੋਣਮਿਤਈ ਦੇ ਕੁੱਝ ਉਪਯੋਗ";
    chapters['Polynomials'] = "2. ﻿ਬਹੁਪਦੀ";
    chapters['Circles'] = "10. ਚੱਕਰ";
    chapters['Construction'] = "11. ਰਚਨਾਵਾਂ ";
    chapters['Surface Areas and Volumes'] = "13. ਸਤ੍ਹਾ ਦਾ ਖੇਤਰਫਲ ਅਤੇ ਆਇਤਨ";
    chapters['Probability'] = "15. ਸੰਭਾਵਨਾ";

  return chapters[name];
}

// Init App
var app = new Framework7({
  id: 'io.framework7.testapp',
  root: '#app',
  theme: theme,
  data: function () {
    return {
      user: {
        firstName: 'John',
        lastName: 'Doe',
      },
    };
  },
  methods: {
    helloWorld: function () {
      app.dialog.alert('Hello World!');
    },
  },
  routes: routes,
  vi: {
    placementId: 'pltd4o7ibb9rc653x14',
  },
});

// Option 2. Using live 'page:init' event handlers for each page
$(document).on('page:init', '.page[data-name="chapter"]', function (e) {
  var data;

   var settings = {
      "async": true,
      "crossDomain": true,
      "url": "http://abhyas.retouchingwork.org/webservices/all_pages",
      "method": "GET",
      "headers": {
        "authorization": "Basic YXJ0d29ybGQ6YWRtaW4hQCMxMjM5Nw==",
        "cache-control": "no-cache",
        "postman-token": "3512ee26-4169-cb78-8c49-b6b31e6054a1"
      },
       "data": {
        "medium": localStorage.getItem('medium'),
        "class": localStorage.getItem('class')
      }
            
    }

    jQuery.ajax(settings).done(function (response) {
      chapter = JSON.parse(response);
      var medium_chck= localStorage.getItem('medium');
      console.log(chapter);
      lhtml ="";
      
     
      jQuery.each( chapter.data, function( key, value ) {

         var index = name_to_punjabi(value.chapter);

        if(medium_chck=='punjabi')
        {
          console.log(medium_chck);
        lhtml +='<li data-index="'+index.split('.')[0]+'"><a data-medium="'+value.medium+'" data-chapter="'+value.chapter+'" onclick="show_days(this)" class="item-link item-content" href="javascript:void(0)"><div class="item-media"><img src="img/file-pdf-box.png"></div><div class="item-inner"><div class="item-title">'+name_to_punjabi(value.chapter)+'</div><div class="item-after"></div></div></a></li>';
          }
          else{
            console.log("engg"+medium_chck);
            lhtml +='<li data-index="'+index.split('.')[0]+'"><a data-medium="'+value.medium+'" data-chapter="'+value.chapter+'" onclick="show_days(this)" class="item-link item-content" href="javascript:void(0)"><div class="item-media"><img src="img/file-pdf-box.png"></div><div class="item-inner"><div class="item-title">'+index.split('.')[0]+"."+" "+value.chapter+'</div><div class="item-after"></div></div></a></li>';
        
          } 
          });
      jQuery('.page[data-name="chapter"] .list ul').html(lhtml);

       setTimeout(function(){
          jQuery('.page[data-name="chapter"] .list ul').each(function(){
              var $this = jQuery(this);
              $this.append($this.find('li').get().sort(function(a, b) {
                  return jQuery(a).attr('data-index') - jQuery(b).attr('data-index');
              }));
          });
       },500)
      
     });
  // Do something here when page with data-name="about" attribute loaded and initialized

 // alert('page load');

})

function show_days(chapter){

var chapter_name =jQuery(chapter).attr("data-chapter");

localStorage.setItem('chapter',chapter_name);
   
     app.router.navigate('/list_2/');

}




// Option 2. Using live 'page:init' event handlers for each page
$(document).on('page:init', '.page[data-name="days"]', function (e) {
 var settings = {
          "async": true,
          "crossDomain": true,
          "url": "http://abhyas.retouchingwork.org/webservices/get_one_chapter",
          "method": "POST",
          "headers": {
            "authorization": "Basic YXJ0d29ybGQ6YWRtaW4hQCMxMjM5Nw==",
            "cache-control": "no-cache",
            "postman-token": "3512ee26-4169-cb78-8c49-b6b31e6054a1"
          },
           "data": {
          "chapter": localStorage.getItem('chapter'),
          "medium": localStorage.getItem('medium')
    },
            
 }

    jQuery.ajax(settings).done(function (response) {
      days = JSON.parse(response);
      html = "";     
      jQuery.each( days.data, function( key, value ) {
          var numaric = value.day.split(' ')[1];
          var fullname = name_to_punjabi(value.chapter).split('.');
          if (localStorage.getItem('medium') == 'punjabi') {
            html +='<li data-index="'+ numaric+'" data-pdf="'+value.pdf_file+'" data-medium="'+value.medium+'"  onclick="viewPdfDocument(this)"><a class="item-link item-content" href="javascript:void(0)"><div class="item-media"><img src="img/file-pdf-box.png"></div><div class="item-inner"><div class="item-title">'+' ਦਿਨ '+numaric+' - '+fullname[1]+'</div><div class="item-after"></div></div></a></li>';
          } else {
            html +='<li data-pdf="'+value.pdf_file+'" data-medium="'+value.medium+'"  onclick="viewPdfDocument(this)"><a class="item-link item-content" href="javascript:void(0)"><div class="item-media"><img src="img/file-pdf-box.png"></div><div class="item-inner"><div class="item-title">'+'Day '+numaric+' - '+value.chapter+'</div><div class="item-after"></div></div></a></li>';
          }
      });
      jQuery('.page[data-name="days"] .days_list ul').html(html);

      setTimeout(function(){
            jQuery('.page[data-name="days"] .days_list ul').each(function(){
                var $this = jQuery(this);
                $this.append($this.find('li').get().sort(function(a, b) {
                    return jQuery(a).attr('data-index') - jQuery(b).attr('data-index');
                }));
            });
         },500)
         
     });

})
  
// Option 2. Using live 'page:init' event handlers for each page
$(document).on('page:init', '.page[data-name="viewer"]', function (e) {  
  // If absolute URL from the remote server is provided, configure the CORS
  // header on that server.
  var url = localStorage.getItem('document');

  // Loaded via <script> tag, create shortcut to access PDF.js exports.
  var pdfjsLib = window['pdfjs-dist/build/pdf'];

  // The workerSrc property shall be specified.
  pdfjsLib.GlobalWorkerOptions.workerSrc = 'http://mozilla.github.io/pdf.js/build/pdf.worker.js';

  var pdfDoc = null,
      pageNum = 1,
      pageRendering = false,
      pageNumPending = null,
      scale = 1.5,
      canvas = document.getElementById('the-canvas'),
      ctx = canvas.getContext('2d');

  /**
   * Get page info from document, resize canvas accordingly, and render page.
   * @param num Page number.
   */
  function renderPage(num) {
    pageRendering = true;
    // Using promise to fetch the page
    pdfDoc.getPage(num).then(function(page) {
      var viewport = page.getViewport(scale);
      canvas.height = viewport.height;
      canvas.width = viewport.width;

      // Render PDF page into canvas context
      var renderContext = {
        canvasContext: ctx,
        viewport: viewport
      };
      var renderTask = page.render(renderContext);

      // Wait for rendering to finish
      renderTask.promise.then(function() {
        pageRendering = false;
        if (pageNumPending !== null) {
          // New page rendering is pending
          renderPage(pageNumPending);
          pageNumPending = null;
        }
      });
    });

    // Update page counters
    document.getElementById('page_num').textContent = num;
  }

  /**
   * If another page rendering in progress, waits until the rendering is
   * finised. Otherwise, executes rendering immediately.
   */
  function queueRenderPage(num) {
    if (pageRendering) {
      pageNumPending = num;
    } else {
      renderPage(num);
    }
  }

  /**
   * Displays previous page.
   */
  function onPrevPage() {
    if (pageNum <= 1) {
      return;
    }
    pageNum--;
    queueRenderPage(pageNum);
  }
  document.getElementById('prev').addEventListener('click', onPrevPage);

  /**
   * Displays next page.
   */
  function onNextPage() {
    if (pageNum >= pdfDoc.numPages) {
      return;
    }
    pageNum++;
    queueRenderPage(pageNum);
  }
  document.getElementById('next').addEventListener('click', onNextPage);

  /**
   * Asynchronously downloads PDF.
   */
  pdfjsLib.getDocument(url).then(function(pdfDoc_) {
    pdfDoc = pdfDoc_;
    document.getElementById('page_count').textContent = pdfDoc.numPages;

    // Initial/first page rendering
    renderPage(pageNum);
  });
})