
<?php
/**
 * Portfolio 2.0 — The Lab
 * Six interactive experiments.
 */
?>

<section
    class="p2-playlab"
    id="the-lab"
    data-p2-playlab
    aria-labelledby="p2-playlab-title"
>
    <div class="p2-playlab__inner">

        <header class="p2-playlab__header">
            <div>
                <p class="p2-playlab__eyebrow">
                    05 / THE LAB
                    <span aria-hidden="true">✦</span>
                </p>

                <h2 id="p2-playlab-title">
                    Made to <em>play.</em>
                </h2>
            </div>

            <p class="p2-playlab__intro">
                Geen klantbriefing. Geen deadline.
                Alleen kleine experimenten die reageren
                op jou. Probeer ze maar.
            </p>
        </header>

        <div class="p2-playlab__grid">

            <!-- 01 / ORBIT -->

            <article class="p2-playlab__tile p2-playlab__tile--orbit">
                <div class="p2-playlab__tile-head">
                    <span>01 / ORBIT STUDY</span>
                    <span>CSS + INTERACTION</span>
                </div>

                <button
                    class="p2-playlab__stage p2-playlab__stage--orbit"
                    type="button"
                    data-lab-orbit
                    aria-pressed="false"
                    aria-label="Activeer de orbitanimatie"
                >
                    <span class="p2-playlab__orbit p2-playlab__orbit--outer" aria-hidden="true"></span>
                    <span class="p2-playlab__orbit p2-playlab__orbit--inner" aria-hidden="true"></span>
                    <span class="p2-playlab__orbit-core" aria-hidden="true"></span>
                    <span class="p2-playlab__orbit-satellite" aria-hidden="true"></span>
                </button>

                <div class="p2-playlab__tile-foot">
                    <strong>Een beetje zwaartekracht.</strong>
                    <span>Hover of klik</span>
                </div>
            </article>

            <!-- 02 / LIVING TYPOGRAPHY -->

            <article class="p2-playlab__tile p2-playlab__tile--type">
                <div class="p2-playlab__tile-head">
                    <span>02 / TYPOGRAPHY</span>
                    <span>TYPE IN MOTION</span>
                </div>

                <button
                    class="p2-playlab__stage p2-playlab__stage--type"
                    type="button"
                    data-lab-type
                    aria-pressed="false"
                    aria-label="Verander de typografie"
                >
                    <span class="p2-playlab__living-word" aria-hidden="true">
                        Alive.
                    </span>
                </button>

                <div class="p2-playlab__tile-foot">
                    <strong>Letters met karakter.</strong>
                    <span>Hover of klik</span>
                </div>
            </article>

            <!-- 03 / CATCH ME -->

            <article class="p2-playlab__tile p2-playlab__tile--chase">
                <div class="p2-playlab__tile-head">
                    <span>03 / PLAYFUL UX</span>
                    <span>BUTTON BEHAVIOUR</span>
                </div>

                <div
                    class="p2-playlab__stage p2-playlab__stage--chase"
                    data-lab-chase-zone
                >
                    <button
                        class="p2-playlab__chase-button"
                        type="button"
                        data-lab-chase
                    >
                        Pak me ✦
                    </button>
                </div>

                <div class="p2-playlab__tile-foot">
                    <strong>Niet zo snel!</strong>
                    <span data-lab-chase-result aria-live="polite">
                        Probeer me te pakken
                    </span>
                </div>
            </article>

            <!-- 04 / LIGHT BULB -->

            <article
                class="p2-playlab__tile p2-playlab__tile--light"
                data-lab-light-tile
            >
                <div class="p2-playlab__tile-head">
                    <span>04 / LIGHT SWITCH</span>
                    <span>MICRO FEEDBACK</span>
                </div>

                <button
                    class="p2-playlab__stage p2-playlab__stage--light"
                    type="button"
                    data-lab-light
                    aria-pressed="false"
                    aria-label="Zet het licht aan of uit"
                >
                    <span class="p2-playlab__halo" aria-hidden="true"></span>

                    <svg
                        class="p2-playlab__bulb"
                        viewBox="0 0 100 120"
                        aria-hidden="true"
                        focusable="false"
                    >
                        <path
                            d="M50 12c-22 0-37 16-37 36 0 17 11 27 20 37l3 10h28l3-10c9-10 20-20 20-37 0-20-15-36-37-36Z"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="5"
                            stroke-linejoin="round"
                        />

                        <path
                            d="M36 95h28M40 105h20M45 114h10"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="5"
                            stroke-linecap="round"
                        />

                        <path
                            class="p2-playlab__filament"
                            d="M39 64l11-15 11 15M50 49v30"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="4"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </button>

                <div class="p2-playlab__tile-foot">
                    <strong>Een licht idee.</strong>
                    <span data-lab-light-result aria-live="polite">
                        Klik voor licht
                    </span>
                </div>
            </article>

            <!-- 05 / BUTTON FEEDBACK -->

            <article class="p2-playlab__tile p2-playlab__tile--send">
                <div class="p2-playlab__tile-head">
                    <span>05 / BUTTON STATES</span>
                    <span>CLICK + FEEDBACK</span>
                </div>

                <div class="p2-playlab__stage p2-playlab__stage--send">
                    <button
                        class="p2-playlab__send-button"
                        type="button"
                        data-lab-send
                    >
                        <span data-lab-send-label>
                            Verstuur signaal
                        </span>

                        <span class="p2-playlab__send-icon" aria-hidden="true">
                            ↗
                        </span>
                    </button>

                    <span class="p2-playlab__send-spark p2-playlab__send-spark--a" aria-hidden="true">✦</span>
                    <span class="p2-playlab__send-spark p2-playlab__send-spark--b" aria-hidden="true">✧</span>
                </div>

                <div class="p2-playlab__tile-foot">
                    <strong>Feedback die goed voelt.</strong>
                    <span data-lab-send-result aria-live="polite">
                        Interactiedemo · geen echt bericht
                    </span>
                </div>
            </article>

            <!-- 06 / CURSOR MOODS -->

            <article class="p2-playlab__tile p2-playlab__tile--orb">
                <div class="p2-playlab__tile-head">
                    <span>06 / CURSOR MOODS</span>
                    <span>POINTER PLAY</span>
                </div>

                <button
                    class="p2-playlab__stage p2-playlab__stage--orb"
                    type="button"
                    data-lab-orb-zone
                    aria-pressed="false"
                    aria-label="Beweeg de cursor en activeer de kleine lichtbol"
                >
                    <span class="p2-playlab__orb-shadow" aria-hidden="true"></span>
                    <span class="p2-playlab__cursor-orb" aria-hidden="true"></span>
                    <span class="p2-playlab__orb-tip" aria-hidden="true">
                        Move me
                    </span>
                </button>

                <div class="p2-playlab__tile-foot">
                    <strong>Hij volgt je beweging.</strong>
                    <span>Beweeg of klik</span>
                </div>
            </article>

        </div>

        <p class="p2-playlab__closing">
            // Kleine experimenten. Grote nieuwsgierigheid.
            <span aria-hidden="true">✳</span>
        </p>

    </div>
</section>
