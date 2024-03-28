<?php include 'inc_header.php'; ?>
        <main class="p-5 border rounded-5">
            <h1 class="text-center">회원 약관 및 개인정보 취급방침 동의</h1>
            <h4>회원 약관</h4>
            <textarea name="" id="" cols="30" rows="10" class="form-control">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, blanditiis cumque id placeat quis minus sequi nam odio quo nulla voluptatibus. Esse quidem doloribus iusto dignissimos asperiores! Quaerat vitae deleniti ea laborum fugiat, mollitia ut iusto sit dolorem explicabo tempora saepe at. Necessitatibus dolor, ab libero distinctio tempore impedit et commodi veritatis at. Architecto repellat possimus modi libero officia sequi, maiores molestiae quae, dolores quia dolor reiciendis vitae suscipit hic. Sint asperiores mollitia facere possimus nemo corporis ratione voluptates quas pariatur ex quo, minus, eos molestias fuga odit omnis quibusdam earum, dolore totam. Voluptatem deleniti tenetur veritatis, quod, dolorum nam vel temporibus possimus quos mollitia aspernatur! Id illo, doloribus provident possimus ipsam culpa sit ipsa facilis omnis repellat odio ea cumque neque beatae nihil doloremque porro impedit cupiditate quasi debitis. Ipsa voluptas corporis, minus itaque ipsam eligendi magni expedita esse quam! Aut rerum consectetur obcaecati quae minus saepe cum beatae debitis minima, non inventore, iste repellat impedit labore accusamus facere eos ipsam maiores! Fuga adipisci itaque id culpa aspernatur numquam! Neque nobis reiciendis maxime, reprehenderit fugiat saepe aperiam voluptas similique libero? Consequatur asperiores tempora aliquam. Tenetur, nisi! Deserunt, a cupiditate neque delectus illum, aut ipsum ut minus incidunt mollitia quae et quos voluptatum, dicta aspernatur voluptatibus cumque. Itaque nobis commodi incidunt odit, sed, impedit voluptatum optio reprehenderit illo laborum molestiae numquam eos quis hic inventore ullam alias. Facere qui at excepturi cupiditate harum nesciunt, voluptas repellat aperiam architecto cum perspiciatis obcaecati possimus animi corporis voluptatibus eum quae quos fuga dicta itaque eaque. Distinctio quaerat saepe eveniet nesciunt cupiditate commodi aliquam quas ullam architecto. Corporis, facere? Libero sit inventore repudiandae accusamus, amet eos blanditiis sunt distinctio temporibus? Quos rem harum, cumque voluptatem voluptatum laborum rerum fugiat, quo architecto ipsa magni fuga autem totam odio! Cumque, facere assumenda. Consectetur minima nemo porro!
            </textarea>

            <div class="form-check mt-2">
                <input class="form-check-input" type="checkbox" value="1" id="chk_member1">
                <label class="form-check-label" for="chk_member1">
                    위 약관에 동의하시겠습니까?
                </label>
            </div>

            <h4 class="mt-3">개인정보 취급방침</h4>
            <textarea name="" id="" cols="30" rows="10"
                class="form-control">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum corrupti saepe aut quas voluptatibus iste non eligendi nihil quibusdam cumque repellendus quod, eum voluptates est repellat exercitationem voluptate rerum soluta! Tenetur placeat numquam eveniet deleniti debitis tempora quis illo dolor, architecto, repellendus dicta minima reprehenderit, nihil eos optio at cum soluta sapiente vero nam obcaecati ab voluptatem ea? Beatae asperiores nostrum qui, ab consectetur iste officia atque ipsam enim neque quae ipsum culpa repudiandae. Unde odit eius minus, rem nesciunt, alias soluta nihil dolor provident cumque amet velit qui. Est minima doloremque perspiciatis amet, asperiores alias quidem et eius hic explicabo harum voluptatem beatae possimus maiores? Est aliquam nemo eos ut, facilis libero, voluptas sed incidunt nam aut quo, inventore doloremque maiores laborum illum hic provident sapiente eveniet beatae? Sunt ex delectus officia rerum voluptatum unde fuga consequuntur facilis facere pariatur, quo illo minus sequi nemo laborum voluptatem maiores repellat molestiae. Officia, maxime. Facere porro cupiditate architecto voluptates in nam? Explicabo placeat rerum ab atque expedita temporibus repellendus qui nihil ad soluta hic fugiat, quasi quis nostrum, itaque dolore quia non, iste aliquam ullam iure unde pariatur sed earum. Debitis quia beatae atque consectetur? Quaerat soluta ipsa debitis cum nisi?</textarea>
            <div class="form-check mt-2">
                <input class="form-check-input" type="checkbox" value="1" id="chk_member2">
                <label class="form-check-label" for="chk_member1">
                    위 약관에 동의하시겠습니까?
                </label>
            </div>
            <form method="post" name="stipluation_form" action="member_input.php">
                <input type="hidden" name="chk" value="0">
            </form>
            <div class="mt-4 d-flex justify-content-center gap-2">
                <button class="btn btn-primary w-50" id="btn_member">회원가입</button>
                <button class="btn btn-secondary w-50">가입취소</button>
            </div>
        </main>
<?php include 'inc_footer.php'; ?>