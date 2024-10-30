<div class="u-s-p-y-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pd-tab">
                    <div class="u-s-m-b-30">
                        <ul class="nav pd-tab__list">
                            <li class="nav-item">

                                <a class="nav-link" data-toggle="tab" href="#pd-desc">DESCRIPTION</a></li>
                            <li class="nav-item">

                                <a class="nav-link" data-toggle="tab" href="#pd-tag">TAGS</a></li>
                            <li class="nav-item">

                                <a class="nav-link active" id="view-review" data-toggle="tab" href="#pd-rev">REVIEWS

                                    <span>(<?php echo sizeof($results)?>)</span></a></li>
                        </ul>
                    </div>
                    <div class="tab-content">

                        <!--====== Tab 1 ======-->
                        <div class="tab-pane" id="pd-desc">
                            <div class="pd-tab__desc">
                                <div class="u-s-m-b-15">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div>
                                <div class="u-s-m-b-30">
                                    <ul>
                                        <li><i class="fas fa-check u-s-m-r-8"></i>

                                            <span>Buyer Protection.</span></li>
                                        <li><i class="fas fa-check u-s-m-r-8"></i>

                                            <span>Full Refund if you don't receive your order.</span></li>
                                        <li><i class="fas fa-check u-s-m-r-8"></i>

                                            <span>Returns accepted if product not as described.</span></li>
                                    </ul>
                                </div>
                                <div class="u-s-m-b-15">
                                    <h4>PRODUCT INFORMATION</h4>
                                </div>
                                <div class="u-s-m-b-15">
                                    <div class="pd-table gl-scroll">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>Main Material</td>
                                                    <td>Cotton</td>
                                                </tr>
                                                <tr>
                                                    <td>Color</td>
                                                    <td>Green, Blue, Red</td>
                                                </tr>
                                                <tr>
                                                    <td>Sleeves</td>
                                                    <td>Long Sleeve</td>
                                                </tr>
                                                <tr>
                                                    <td>Top Fit</td>
                                                    <td>Regular</td>
                                                </tr>
                                                <tr>
                                                    <td>Print</td>
                                                    <td>Not Printed</td>
                                                </tr>
                                                <tr>
                                                    <td>Neck</td>
                                                    <td>Round Neck</td>
                                                </tr>
                                                <tr>
                                                    <td>Pieces Count</td>
                                                    <td>1 Piece</td>
                                                </tr>
                                                <tr>
                                                    <td>Occasion</td>
                                                    <td>Casual</td>
                                                </tr>
                                                <tr>
                                                    <td>Shipping Weight (kg)</td>
                                                    <td>0.5</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--====== End - Tab 1 ======-->


                        <!--====== Tab 2 ======-->
                        <div class="tab-pane" id="pd-tag">
                            <div class="pd-tab__tag">
                                <h2 class="u-s-m-b-15">ADD YOUR TAGS</h2>
                                <div class="u-s-m-b-15">
                                    <form>

                                        <input class="input-text input-text--primary-style" type="text">

                                        <button class="btn btn--e-brand-b-2" type="submit">ADD TAGS</button></form>
                                </div>

                                <span class="gl-text">Use spaces to separate tags. Use single quotes (') for phrases.</span>
                            </div>
                        </div>
                        <!--====== End - Tab 2 ======-->


                        <!--====== Tab 3 ======-->
                        <div class="tab-pane fade show active" id="pd-rev">
                            <div class="pd-tab__rev">
                                <div class="u-s-m-b-30">
                                    <div class="pd-tab__rev-score">
                                        <div class="u-s-m-b-8">
                                            <h2><?php echo sizeof($results).' Reviews - '.$starRate.' (Overall)'?> </h2>
                                        </div>
                                        <div class="gl-rating-style-2 u-s-m-b-8">
                                        <?php
                                            $starCnt = !empty($rateCnt['cnt']) ? $rateCnt['cnt'] : 1;
                                            for($i = 1 ; $i <= 5; $i++ )
                                            { 
                                                if($i <= (int) ($rate['avgrate'] / $starCnt))
                                                echo '<i class="fas fa-star"></i>';
                                                elseif (($i - (int) ($rate['avgrate'] / $starCnt) > 0) && ((int) ($rate['avgrate'] / $starCnt)) != 0) {
                                                    // Nếu có phần thập phân, thêm ngôi sao rỗng (outline)
                                                    echo '<i class="fas fa-star-half-alt"></i>';
                                                } else {
                                                    // Ngôi sao rỗng (outline)
                                                    echo '<i class="far fa-star"></i>';
                                                }
                                            }
                                        ?>
                                        </div>
                                        <div class="u-s-m-b-8">
                                            <h4>We want to hear from you!</h4>
                                        </div>

                                        <span class="gl-text">Tell us what you think about this item</span>
                                    </div>
                                </div>
                                <div class="u-s-m-b-30">
                                    <form class="pd-tab__rev-f1">
                                        <div class="rev-f1__group">
                                            <div class="u-s-m-b-15">
                                                <h2><?php echo sizeof($results).' Review(s) for '.$product['TENSP']?></h2>
                                            </div>
                                            <!-- <div class="u-s-m-b-15">

                                                <label for="sort-review"></label><select class="select-box select-box--primary-style" id="sort-review">
                                                    <option selected>Sort by: Best Rating</option>
                                                    <option>Sort by: Worst Rating</option>
                                                </select></div> -->
                                        </div>
                                        <div class="rev-f1__review">
                                            <?php
                                                foreach($results as $value)
                                                {?>
                                                    <div class="review-o u-s-m-b-15">
                                                        <div class="review-o__info u-s-m-b-8">

                                                            <span class="review-o__name"><?php echo $value['HOTEN']?></span>

                                                            <span class="review-o__date"><?php echo $value['THOIGIAN']?></span>
                                                        </div>
                                                        <div class="review-o__rating gl-rating-style u-s-m-b-8">
                                                            <?php
                                                                for($i = 0 ; $i < 5; $i++ )
                                                                { 
                                                                    if($i < $value['RATE'])
                                                                        echo '<i class="fas fa-star"></i>';
                                                                    else
                                                                        echo '<i class="far fa-star"></i>';
                                                                }
                                                            ?>
                                                        </div>
                                                        <p class="review-o__text"><?php echo $value['NOIDUNG']?></p>
                                                    </div>
                                                <?php
                                                }
                                            ?>
                                        </div>
                                        <div  id="listCmt" >

                                        </div>
                                    </form>
                                </div>
                                <div class="u-s-m-b-30">
                                    <div class="pd-tab__rev-f2">
                                        <h2 class="u-s-m-b-15">Add a Review</h2>

                                        <span class="gl-text u-s-m-b-15">Your email address will not be published. Required fields are marked *</span>
                                        <div class="u-s-m-b-30">
                                            <div class="rev-f2__table-wrap gl-scroll">
                                                <table class="rev-f2__table">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <div class="gl-rating-style-2"><i class="fas fa-star"></i>

                                                                    <span>(1)</span></div>
                                                            <th>
                                                                <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                                                    <span>(2)</span></div>
                                                            </th>
                                                            <th>
                                                                <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                                                    <span>(3)</span></div>
                                                            </th>
                                                            <th>
                                                                <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                                                    <span>(4)</span></div>
                                                            </th>
                                                            <th>
                                                                <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                                                    <span>(5)</span></div>
                                                            </th>
                                                        </tr>
                                                    </thead>

                                                </table>
                                            </div>
                                        </div>
                                        <div>
                                            <p>Your review *</p>
                                            <ul id="rate" style="display: flex; padding-left: 10px;column-gap: 1rem; list-style: none;">
                                                <li><i class="far fa-star ratting-btn" style="font-size: 1.2rem; color: #ff4500;"></i></li>
                                                <li><i class="far fa-star ratting-btn" style="font-size: 1.2rem; color: #ff4500;"></i></li>
                                                <li><i class="far fa-star ratting-btn" style="font-size: 1.2rem; color: #ff4500;"></i></li>
                                                <li><i class="far fa-star ratting-btn" style="font-size: 1.2rem; color: #ff4500;"></i></li>
                                                <li><i class="far fa-star ratting-btn" style="font-size: 1.2rem; color: #ff4500;"></i></li>
                                            </ul>
                                        </div>
                                        <div class="u-s-m-b-30" style="display: none; column-gap: .6rem">
                                            <!--====== checkbox Box ======-->
                                            <div class="checkbox-box">
                                                <input class="ratting-input" type="checkbox" id="star-1" name="rating"  style="width: 1.5rem; height: 1.5rem" >
                                            </div>
                                            <!--====== End - checkbox Box ======-->
                                            <!--====== checkbox Box ======-->
                                            <div class="checkbox-box">
                                                <input class="ratting-input" type="checkbox" id="star-2" name="rating"  style="width: 1.5rem; height: 1.5rem">
                                            </div>
                                            <!--====== End - checkbox Box ======-->
                                            <!--====== checkbox Box ======-->
                                            <div class="checkbox-box">
                                                <input class="ratting-input" type="checkbox" id="star-3" name="rating"  style="width: 1.5rem; height: 1.5rem">
                                            </div>
                                            <!--====== End - checkbox Box ======-->
                                            <!--====== checkbox Box ======-->
                                            <div class="checkbox-box">
                                                <input class="ratting-input" type="checkbox" id="star-4" name="rating"  style="width: 1.5rem; height: 1.5rem">
                                            </div>
                                            <!--====== End - checkbox Box ======-->
                                            <!--====== checkbox Box ======-->
                                            <div class="checkbox-box">
                                                <input class="ratting-input" type="checkbox" id="star-5" name="rating"  style="width: 1.5rem; height: 1.5rem">
                                            </div>
                                            <!--====== End - checkbox Box ======-->
                                        </div>
                                        <div class="rev-f2__group">
                                            <div class="u-s-m-b-15">

                                                <label class="gl-label" for="reviewer-text">YOUR REVIEW *</label><textarea class="content text-area text-area--primary-style" id="reviewer-text" name="content"></textarea></div>
                                            <div>
                                                <p class="u-s-m-b-30">

                                                    <label class="gl-label" for="reviewer-name">NAME *</label>

                                                    <input class="input-text input-text--primary-style"  name="fname" type="text" id="reviewer-name" required></p>
                                                <p class="u-s-m-b-30">

                                                    <label class="gl-label" for="reviewer-email" >EMAIL *</label>

                                                    <input class="input-text input-text--primary-style" name="email" type="text" id="reviewer-email" required></p>
                                            </div>
                                        </div>
                                        <p id="noti" style="color: red; font-size: 1.2rem; padding:0 1rem 1rem"></p>
                                        
                                        <div>

                                            <button id="btn" class="btn btn--e-brand-shadow">SUBMIT</button></div>
                                    </div>
                                            </div>
                            </div>
                        </div>
                        <!--====== End - Tab 3 ======-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var rattingBtn = document.querySelectorAll('.ratting-btn');
    var rattingInput = document.querySelectorAll('.ratting-input');
    var content = document.querySelector('.content');
    var submitBtn = document.querySelector('#btn');
    var fname = document.getElementById('reviewer-name');
    var email = document.getElementById('reviewer-email');
    var lstCmt = document.getElementById('listCmt');
    var noTi = document.getElementById('noti');

    var rate = 0;

    rattingBtn.forEach((item, key ) => {
        item.onclick = () => {
            for(let i = 0; i< 5; i++)
            {
                rattingBtn[i].classList.remove('far');
                rattingInput.checked = false;
            }
            for(let i = 4; i>-1; i--)
            {
                if(i <= key)
                {
                    rattingBtn[i].classList.add('fas');
                    rattingInput[i].checked = true;
                }
                else 
                {
                    rattingBtn[i].classList.remove('fas');
                    rattingBtn[i].classList.add('far');
                    rattingInput[i].checked = false;
                }
            }
            rate = key + 1;
        }
    })

    submitBtn.onclick = () => {
        $.ajax({
            url:'../model/comment.php',
            method:'post',
            dataType: 'json' ,
            data: {
                rate:rate,
                content: content.value,
                id_sp: <?php echo $product['0']?>,
                fname: fname.value,
                email: email.value,
            },
            success:(result) => {
                console.log(result);

                if(result === "Bạn cần đăng nhập!")
                {
                    noTi.innerHTML = `You need to log in! <a href="../pages/signin.php">Click here to log in</a>`;
                }

                else {
                    if(result.rate != 0 && result.fname != '' && result.email != '')
                    {
                        let star = '';

                        for(let i =0 ; i<5; i++)
                        {
                            if(i< result.rate)
                                star += `<i class="fas fa-star"></i>`;
                            else 
                                star += `<i class="far fa-star"></i>`;
                        }

                        // let msg = `
                        //     <div class="review-o u-s-m-b-15">
                        //         <div class="review-o__info u-s-m-b-8">

                        //             <span class="review-o__name">${result.fname}</span>

                        //             <span class="review-o__date">27 Feb 2018 10:57:43</span></div>
                        //         <div class="review-o__rating gl-rating-style u-s-m-b-8">
                        //             ${star}
                        //         </div>
                        //         <p class="review-o__text">${result.content}</p>
                        // </div>
                        // ` ;
                        let msg = `Your comment is being processed!`;
                        lstCmt.innerHTML = msg;
                    }
                }
            }
        });
    }
</script>