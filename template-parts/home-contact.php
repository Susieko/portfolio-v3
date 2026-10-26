
<?php
$contact_email = susan_portfolio_contact_recipient();
?>

<section class="p2-contact" id="contact" aria-labelledby="p2-contact-title">

    <div class="p2-contact__constellation" aria-hidden="true">
        <svg viewBox="0 0 600 400" fill="none">
            <path d="M35 275 L175 145 L310 220 L440 85 L565 150"
                  stroke="#B9A7FF" stroke-opacity=".22"/>
            <path d="M175 145 L225 45 M310 220 L380 345"
                  stroke="#698EFF" stroke-opacity=".16"/>
            <circle cx="35" cy="275" r="3" fill="#B9A7FF"/>
            <circle cx="175" cy="145" r="4" fill="#D8CBFF"/>
            <circle cx="310" cy="220" r="3" fill="#698EFF"/>
            <circle cx="440" cy="85" r="5" fill="#B9A7FF"/>
            <circle cx="565" cy="150" r="3" fill="#698EFF"/>
            <circle cx="225" cy="45" r="2" fill="#D8CBFF"/>
            <circle cx="380" cy="345" r="2" fill="#D8CBFF"/>
        </svg>
    </div>

    <div class="p2-contact__inner">

        <div class="p2-contact__intro">

            <p class="p2-contact__eyebrow">
                07 / THE NEXT CHAPTER
                <span aria-hidden="true">✦</span>
            </p>

            <h2 id="p2-contact-title">
                Heb jij<br>
                een <em>idee?</em>
            </h2>

            <p class="p2-contact__statement">
                Ik bouw graag mee.
            </p>

            <p class="p2-contact__description">
                Of je nu een developer zoekt voor je team,
                een website wilt ontwikkelen of gewoon iets
                wilt bespreken: ik hoor graag van je.
            </p>

            <div class="p2-contact__actions">

<?php
$contact_email = function_exists('susan_portfolio_contact_recipient')
    ? susan_portfolio_contact_recipient()
    : 'Lily-SA@hotmail.com';

$mail_subject = rawurlencode('Een idee voor een samenwerking');

$mail_url = 'mailto:' . sanitize_email($contact_email)
    . '?subject=' . $mail_subject;
?>

<a
    href="<?php echo esc_url($mail_url); ?>"
    class="p2-contact-cta p2-contact-cta--primary"
>
    <span>Stuur me een bericht</span>
    <span aria-hidden="true">✦</span>
</a>

<a
    href="https://github.com/Susieko"
    class="p2-contact-cta p2-contact-cta--secondary"
    target="_blank"
    rel="noopener noreferrer"
    aria-label="Bekijk mijn GitHub-profiel (opent in nieuw tabblad)"
>
    <svg
        viewBox="0 0 24 24"
        width="18"
        height="18"
        fill="currentColor"
        aria-hidden="true"
        focusable="false"
    >
        <path d="M12 .75a11.25 11.25 0 0 0-3.558 21.924c.563.106.77-.244.77-.542 0-.266-.01-.974-.015-1.912-3.133.681-3.794-1.51-3.794-1.51-.512-1.303-1.25-1.65-1.25-1.65-1.023-.698.078-.684.078-.684 1.132.08 1.727 1.162 1.727 1.162 1.005 1.723 2.637 1.225 3.28.937.102-.728.392-1.226.713-1.508-2.501-.284-5.132-1.25-5.132-5.562 0-1.229.439-2.234 1.16-3.022-.117-.285-.503-1.43.11-2.978 0 0 .945-.302 3.094 1.154a10.77 10.77 0 0 1 5.632 0c2.146-1.456 3.09-1.154 3.09-1.154.614 1.548.228 2.693.112 2.978.723.788 1.159 1.793 1.159 3.022 0 4.323-2.635 5.274-5.143 5.553.404.349.764 1.038.764 2.093 0 1.511-.014 2.73-.014 3.102 0 .301.203.654.775.542A11.252 11.252 0 0 0 12 .75Z"/>
    </svg>

    <span>GitHub</span>
</a>

            </div>
        </div>

        <div class="p2-contact__signal">

            <div class="p2-contact__signal-top">
                <span class="p2-contact__signal-name">
                    // open.connection
                </span>

<button
    class="p2-contact-star"
    type="button"
    aria-label="Laat het sterretje fonkelen"
>
    <span class="p2-contact-star__core" aria-hidden="true">
        ✦
    </span>

    <span class="p2-contact-star__particle p2-contact-star__particle--one" aria-hidden="true">✧</span>
    <span class="p2-contact-star__particle p2-contact-star__particle--two" aria-hidden="true">✦</span>
    <span class="p2-contact-star__particle p2-contact-star__particle--three" aria-hidden="true">✧</span>
</button>

            </div>

            <div class="p2-contact__signal-content">

                <div class="p2-contact__signal-symbol"
                     aria-hidden="true">
                    <span>✦</span>
                    <span>✧</span>
                </div>

                <p class="p2-contact__signal-label">
                    CONNECTION STATUS
                </p>

                <div class="p2-contact__availability">
                    <span class="p2-contact__availability-dot"
                          aria-hidden="true"></span>
                    Open voor nieuwe mogelijkheden
                </div>

                <p class="p2-contact__signal-copy">
                    Liever rechtstreeks mailen?
                    Dat kan natuurlijk ook.
                </p>

                <div class="p2-contact__email">
                    <a href="<?php echo esc_url('mailto:' . $contact_email); ?>">
                        <?php echo esc_html($contact_email); ?>
                    </a>

                    <button
                        type="button"
                        class="p2-contact__copy"
                        data-p2-copy-email="<?php echo esc_attr($contact_email); ?>"
                        aria-label="Kopieer e-mailadres"
                    >
                        <svg viewBox="0 0 24 24"
                             width="17"
                             height="17"
                             fill="none"
                             aria-hidden="true">
                            <rect x="8" y="8" width="12" height="12" rx="2"/>
                            <path d="M16 8V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2"/>
                        </svg>
                    </button>
                </div>

                <p class="p2-contact__feedback"
                   data-p2-copy-feedback
                   role="status"
                   aria-live="polite"></p>
            </div>

            <div class="p2-contact__signal-bottom">
                <span>DESIGN × DEVELOPMENT</span>
                <span>LET'S CONNECT ↗</span>
            </div>
        </div>

    </div>

    <footer class="p2-contact__footer">
        <span>© <?php echo esc_html(wp_date('Y')); ?> SUSAN ABEN</span>
        <span>MADE WITH CURIOSITY ✳</span>
        <a href="<?php echo esc_url(home_url('/privacy/')); ?>">
            Privacy
        </a>
    </footer>

</section>
