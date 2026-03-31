<?php ?>
<section id="contact">
    <div class="inner">
        <section>
            <form method="post" action="#">
                <div class="fields">
                    <div class="field half">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name"/>
                    </div>
                    <div class="field half">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email"/>
                    </div>
                    <div class="field">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" rows="6"></textarea>
                    </div>
                </div>
                <ul class="actions">
                    <li><input type="submit" value="Send Message" class="primary"/></li>
                    <li><input type="reset" value="Clear"/></li>
                </ul>
            </form>
        </section>
        <section class="split">
            <section>
                <div class="contact-method">
                    <span class="icon solid alt fa-envelope"></span>
                    <h3>Email</h3>
                    <a href="#">{{$contact['mail']}}</a>
                </div>
            </section>
            <section>
                <div class="contact-method">
                    <span class="icon solid alt fa-phone"></span>
                    <h3>Phone</h3>
                    @foreach($contact['phone'] as $value)
                        <a class="phone-link" href="tel:{{ preg_replace('/[^0-9+]/', '', $value) }}">
                            {{ $value }}
                        </a><br>
                    @endforeach
                </div>
            </section>
            <section>
                <div class="contact-method">
                    <span class="icon solid alt fa-home"></span>
                    <h3>Address</h3>
                    <span>1234 Somewhere Road #5432<br/>
										Nashville, TN 00000<br/>
										United States of America</span>
                </div>
            </section>
        </section>
    </div>
</section>
<style>
    .phone-link {
        border-bottom: none;
        color: #fff;
        transition: 0.2s;
    }

    .phone-link:hover {
        text-decoration: underline; /* появляется только при наведении */
    }
</style>
