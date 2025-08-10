<div class="index-footer">
    <div class="index-footer-content">
    <div class="index-contents">
        <div class="index-left">
        <div class="index-logo">
            <span class="index-text46">
            <span class="index-text47">(CMS)</span>
            <span class="index-text48"> </span>
            <span>Blog Site</span>
            </span>
        </div>
        <div class="index-footer-description">
            <span class="index-text50">
            <span>Explore a wide range of topics, from technology and science to lifestyle and culture. Whether you're seeking expert advice, inspiration, or entertainment, you'll find it all here. Join our community of avid readers and writers and embark on a journey of discovery and enlightenment. Start exploring today</span>
            </span>
        </div>
        </div>
        <div class="index-middle">
        <div class="index-middletitle">
            <span class="index-footer-sub-heading">
            <span>Having Trouble?</span>
            </span>
        </div>
        <div class="index-email">
            <img src="public/external/emailicon4891-6xif.svg" alt="emailicon4891" class="index-emailicon" />
            <div class="index-email1">
            <span>
                <span>cmsblogsite@gmail.com</span>
            </span>
            </div>
        </div>
        <div class="index-facebook">
            <div class="index-facebookicon">
            <img src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/20612b5c-a598-48ed-9742-3b4041964df5/95e58d4d-defe-4d37-91aa-de052e52d006?org_if_sml=1380&amp;force_format=original" alt="image25010" class="index-image2" />
            </div>
            <div class="index-facevook">
            <span >
                <span>facebook.com/cms.blogsite</span>
            </span>
            </div>
        </div>
        <div class="index-twitter">
            <div class="index-twittericon">
            <img src="https://aheioqhobo.cloudimg.io/v7/_playground-bucket-v2.teleporthq.io_/20612b5c-a598-48ed-9742-3b4041964df5/c7f1cdc7-5f39-4577-968e-1d09eebf9126?org_if_sml=1518&amp;force_format=original" alt="image35010" class="index-image3" />
            </div>
            <div class="index-facevook1">
            <span>
                <span>twitter.com/cms.blogsite</span>
            </span>
            </div>
        </div>
        </div>
        <div class="index-right">
        <div class="index-middletitle1">
            <span class="index-footer-sub-heading">
            <span>You might want to check</span>
            </span>
        </div>
        <div class="index-email">
            <div class="index-email3">
            <a href="about.php" ><span>About</span></a>
            </div>
        </div>
        <div class="index-email">
            <div class="index-email5">
            <a href="collection.php">
                <span>Collection</span>
            </a>
            </div>
        </div>
        </div>
    </div>
    <div class="index-copy-rights">
        <div class="index-frame19">
        <span class="index-text66">
            <span>Copy Right 2024 (CMS) Blog Site</span>
        </span>
        </div>
        <div class="index-frame20">
        <span class="index-text68">
            <span>All Right Reserved</span>
        </span>
        </div>
    </div>
    </div>
</div>
</div>
</div>
    </div>
    <script src="js/index.js"></script>
    <script>
   $(document).ready(function() {
    loadBlog(); 

    $('#addCommentForm').on("submit", function(e){
            e.preventDefault();
            var datas = $(this).serializeArray();
            var data_array = {};
            // console.log(data_array)
            $.map(datas, function(data){
                data_array[data['name']]=data['value'];
            });
            // console.log(data_array)
            $.ajax({
                url: "controllers/admin.contr.php",
                method: "POST",
                data:{
                    'add_comment': true,
                    ...data_array,
                },
                success:function(result){
                    console.log(result)
                    window.location.reload();
                },
                error:function(error){
                    alert("Something went wrong");
                }
            })
        })

    function loadBlog(){
        $.ajax({
            url: "controllers/admin.contr.php",
            method: "POST",
            data:{
                "load_blog": true,
            },
            success:function(result){
                console.log(result)
                var tBody = ``;
                var datas = JSON.parse(result);
                console.log(datas);
                datas.forEach(function(data){
                    tBody += `
                            <div  style="max-width: 20em; " class="index-contents-main">
                            <div class="index-picture">
                                <img style="height: unset" src="public/internal/${data['blog_image']}" class="index-markuswinklert-gb-xi-hc-p-kr-munsplash1" />
                                <div class="thumbnail-overlay">
                                    <button data-post-id="${data['blog_id']}">
                                        <img class="like-img" src="public/external/heart-like.svg">
                                    </button>
                                    <a href="/viewBlog?id=${data['blog_id']}" class="go-button"><span>Read more</span><i><img src="public/external/go-collection.svg" alt="dropdownarrowsvgrepocom11365" class="like-button-picture" /></i></a>
                                    </span>
                                </div>
                            </div>
                            <div  style="width: 100%" class="index-categories">
                                <span style="font-size: .7em" class="index-text22">
                                    <span>${data['blog_category']}</span>
                                    <span class="like-count pl-5">${data['blog_likes']}</span>
                                    <img style="width: 1.5em; padding-left: .3em;" src="public/external/heart-cat.svg">
                                </span>
                            </div>
                            <div class="index-blog-title">
                                <span style="width: 100%; font-size: 1em" class="index-text24">
                                <span>${data['blog_title']}</span>
                                </span>
                            </div>
                            <div class="index-description">
                                <span style="font-size: .7em" class="index-text26">
                                <span>${data['blog_description']}</span>
                                </span>
                            </div>
                            <div style="width: 100%;" class="index-categories">
            
                            </div>
                        </div>
                    `;
                    });

                $('.index-stories').html(tBody);
            },
            error:function(error){
                alert("Something went wrong")
            }
        })
    }

    $(document).on("click", ".sub-nav-button", function() {
        var category = $(this).data('category');
        
        $.ajax({
            url: 'controllers/admin.contr.php',
            method: 'POST',
            data: {
                'filter_blog': true,
                'category': category
            }, 
            success: function(result) {
                // console.log(result)
                var tBody = ``;
                var datas = JSON.parse(result);
                console.log(datas);
                datas.forEach(function(data){
                    tBody += `
                            <div  style="max-width: 20em; " class="index-contents-main">
                            <div class="index-picture">
                                <img style="height: unset" src="public/internal/${data['blog_image']}" class="index-markuswinklert-gb-xi-hc-p-kr-munsplash1" />
                                <div class="thumbnail-overlay">
                                    <button class=".like-button" data-post-id="'${data['blog_id']}">
                                        <img class="like-img" src="public/external/heart-like.svg">
                                    </button>
                                    <a href="/viewBlog?id='${data['blog_id']}" class="go-button"><span>Read more</span><i><img src="public/external/go-collection.svg" alt="dropdownarrowsvgrepocom11365" class="like-button-picture" /></i></a>
                                    </span>
                                </div>
                            </div>
                            <div  style="width: 100%" class="index-categories">
                                <span style="font-size: .7em" class="index-text22">
                                    <span>${data['blog_category']}</span>
                                    <span class="like-count pl-5">${data['blog_likes']}</span>
                                    <img style="width: 1.5em; padding-left: .3em;" src="public/external/heart-cat.svg">
                                </span>
                            </div>
                            <div class="index-blog-title">
                                <span style="width: 100%; font-size: 1em" class="index-text24">
                                <span>${data['blog_title']}</span>
                                </span>
                            </div>
                            <div class="index-description">
                                <span style="font-size: .7em" class="index-text26">
                                <span>${data['blog_description']}</span>
                                </span>
                            </div>
                            <div style="width: 100%;" class="index-categories">
            
                            </div>
                        </div>
                    `;
                });
                $('.index-stories').html(tBody);
            },
            error: function(xhr, status, error) {
                console.error('Error loading blogs:', error);
            }
        });
    });

    loadComments();

    $(document).on("click", ".open-menu-modal2", function() {
        const modal = document.querySelector(".nav-menu-modal");
        modal.show();
    });

    $(document).on("click", ".menu-close-modal", function() {
        const modal = document.querySelector(".nav-menu-modal");
        modal.close();
    });

    function loadComments(){ 
        $.ajax({
            url: "controllers/comment.contr.php",
            method: "POST",
            data:{
                "get_comment": true,
            },
            success:function(result){
                console.log(result)
                var tBody = ``;
                var datas = JSON.parse(result);
                console.log(datas);
                var i = 1;
                datas.forEach(function(data){
                    tBody += `<tr>`;
                        tBody += `<td style='text-align: center'>${i}</td>`;
                        tBody += `<td style='text-align: justify'>${data["blog_title"]}</td>`;
                        tBody += `<td><img src='public/internal/${data["blog_image"]}' style='width: 10em'></td>`;
                        tBody += `<td style='text-align: justify'>${data["blog_description"]}</td>`;
                        tBody += `<td>${data["blog_category"]}</td>`;
                        tBody += `<td style='text-align: center'>${data["created_at"]}</td>`;
                        tBody += `<td style='text-align: center'>${data["blog_likes"]}</td>`;
                        tBody += `<td class='d-flex justify-content-center'>
                                    <button class="btn btn-warning btn-sm me-1" openUpdateModal data-blog-id="${data['blog_id']}">Update</button>
                                    <button class="btn btn-danger btn-sm" deleteStudent data-blog-id="${data['blog_id']}">Archive</button>
                                </td>`;
                        tBody += `</tr>`;
                        i++;
                    });

                $('#tBodyBlogs').html(tBody);
            },
            error:function(error){
                alert("Something went wrong")
            }
        })
    }

    $('#addCommentForm').on("submit", function(e){
        e.preventDefault();
        var datas = $(this).serializeArray();
        var data_array = {};
        $.map(datas, function(data){
            data_array[data['name']]=data['value'];
        });
        // console.log(datas);
        // console.log(data_array);
        $.ajax({
            url: "controllers/comment.contr.php",
            method: "POST",
            data:{
                'add_comment': true,
                ...data_array,
            },
            success:function(respond){
                popUpSuccessModal(respond);
            },
            error:function(error){
                alert("Something went wrong");
            }
        })
    })

    $(document).on("input", "#search_collection", function() {
        var query = $(this).val();

        $.ajax({
            url: "controllers/main.contr.php",
            method: "POST",
            data: {
                "search_collection": true,
                "query": query
            },
            
            success: function(result) {
                // console.log(result)
                var tBody = ``;
                var datas = JSON.parse(result);
                console.log(datas);
                datas.forEach(function(data){
                    tBody += `
                            <div  style="max-width: 20em; " class="index-contents-main">
                            <div class="index-picture">
                                <img style="height: unset" src="public/internal/${data['blog_image']}" class="index-markuswinklert-gb-xi-hc-p-kr-munsplash1" />
                                <div class="thumbnail-overlay">
                                    <button class=".like-button" data-post-id="'${data['blog_id']}">
                                        <img class="like-img" src="public/external/heart-like.svg">
                                    </button>
                                    <a href="/viewBlog?id='${data['blog_id']}" class="go-button"><span>Read more</span><i><img src="public/external/go-collection.svg" alt="dropdownarrowsvgrepocom11365" class="like-button-picture" /></i></a>
                                    </span>
                                </div>
                            </div>
                            <div  style="width: 100%" class="index-categories">
                                <span style="font-size: .7em" class="index-text22">
                                    <span>${data['blog_category']}</span>
                                    <span class="like-count pl-5">${data['blog_likes']}</span>
                                    <img style="width: 1.5em; padding-left: .3em;" src="public/external/heart-cat.svg">
                                </span>
                            </div>
                            <div class="index-blog-title">
                                <span style="width: 100%; font-size: 1em" class="index-text24">
                                <span>${data['blog_title']}</span>
                                </span>
                            </div>
                            <div class="index-description">
                                <span style="font-size: .7em" class="index-text26">
                                <span>${data['blog_description']}</span>
                                </span>
                            </div>
                            <div style="width: 100%;" class="index-categories">
            
                            </div>
                        </div>
                    `;
                });
                $('.index-stories').html(tBody);
            },
            error: function() {
                alert("Something went wrong during search");
            }
        });
    });

    })

    $('.like-button').on("click", function(e) {
        var postId = button.data('post-id');
        
        $.ajax({
            url: 'controllers/blog.contr.php',
            method: 'POST',
            data: {postId: postId},
            success: function(response) {
                var likeCountSpan = $('.like-count[data-post-id="' + postId + '"]');
                var currentLikes = parseInt(likeCountSpan.text());
                var newLikes = currentLikes + 1;
                likeCountSpan.text(newLikes);
                
                
                button.addClass('liked'); 
                button.prop('disabled', true); 
                
               
                if (response.alreadyLiked) {
                   
                    button.find('.like-button-picture').css('fill', '#CA2C17'); 
                }
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }
        });
});




    </script>
  </body>
</html>
