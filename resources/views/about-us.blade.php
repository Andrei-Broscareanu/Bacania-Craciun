<x-app>
    <section class="blog-details-hero set-bg" data-setbg="img/blog/details/details-hero.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2>Cel mai scurt drum al legumelor: din fermă direct pe masa ta! Întotdeauna proaspăt!</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->



    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__item">
                            <h4>Categories</h4>
                            <ul>
                                @foreach($categories as $category)
                                    <li><a href="{{ route('shop', ['category' => $category->name]) }}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 order-md-1 order-1">
                    <div class="blog__details__text">
                        <h3>Bună!
                            Sunt Mihai și reprezint Grădina Crăciun, ferma noastră unde producem legume și fructe cu gust inconfundabil, al celor din grădina bunicilor.</h3>
                        <div class="center-image">
                            <img src="img/primapoza.jpg" alt="">
                        </div>
                        <p>Povestea noastră a început din dorința de a produce hrană sănătoasă pentru noi și familia noastră. Astfel, am început să cultivăm fructe și legume, activitate care s-a dezvoltat organic, transformându-se astăzi într-o mică afacere de familie, în care temelia a fost pasiunea, seriozitatea și priceperea.
                            În anul 2011, am înființat societatea comercială AGROSER MAC SRL, al cărei obiect de activitate a fost, inițial, creșterea legumelor în spații protejate. Ulterior, ne-am dezvoltat, iar astăzi avem, în plus, o livadă de cireși și un magazin propriu în care desfacem produsele noastre, precum și ale altor producători, asemenea nouă.
                            Lucrăm o suprafața de aproximativ 1000 mp de solarii de legume, 600 mp de grădină de legume, 500 mp de plantație de căpșuni și 5000 mp de livadă de cireși, vișini și alte câteva specii pomicole.</p>
                        <div class="center-image">
                            <img src="img/adouapoza.jpg" alt="">
                        </div>
                        <p>Suprafața protejată este prevăzută, în sezonul cald, cu plase de umbrire și cu plase împotriva insectelor pentru a putea oferi protecție plantelor și a crea un microclimat benefic pentru dezvoltarea lor.
                            Soiurile de bază pe care noi le cultivăm cu pricepere sunt: diverse feluri de roșii, ardei gras, ardei kapia, castraveți, vinete, dovlecei, ardei iute, salată, spanac, ceapă, ridichi, fasole și multe altele.</p>
                        <div class="center-image">
                            <img src="img/apatrapoza.jpg" alt="">
                        </div>
                        <p>Pentru a obține calitatea și gustul autentic și pentru a vă oferi cele mai bune legume, îngrașământul folosit la pregătirea terenului este gunoiul de grajd macerat, în special cel provenit de la microferma noastră de păsări. Polenizarea, atât în solarii, cât și în grădină și în livadă, o facem cu ajutorul bondarilor. Solariile sunt închise cu plasă împotriva dăunătorilor. În plus, în interiorul solariilor, folosim metode ecologice de combatere a dăunătorilor și, implicit, a bolilor: benzi/ capcane cu feromoni și lămpi UV. Irigarea se face prin picurare; astfel, plantele primesc exact cantitatea necesară de apă pentru o dezvoltare naturală.
                            Drumul de la primul fir de roșie plantat de noi în grădină și până astăzi a fost unul presărat cu bune și cu rele, care, în egală măsură, ne-au condus către realizarea unor noi proiecte, toate dragi nouă, complementare activității de bază:</p>
                            <h3>• Magazinul propriu Băcănia Grădina Crăciun, spațiu în care desfacem producția proprie, dar și produse provenite de la alți producători autohtoni.


                            </h3>
                        <div class="center-image">
                            <img src="img/a5apoza.jpg" alt="">
                        </div>
                        <h3>Spațiul destinat producției de conserve de legume și fructe, locul în care producem artizanal, din materia primă provenită din ferma noastră, diverse conserve de legume și fructe, ca de exemplu: suc de roșii, pastă de roșii, pastă de ardei kapia, castraveți murați, zacuscă de vinete, etc.</h3>
                        <div class="center-image">
                            <img src="img/a6apoza.jpg" alt="">
                        </div>
                        <p>Gustul deosebit al produselor noastre este apreciat de clienți, iar feedback-ul lor ne motivează să mergem mai departe și să găsim soluții pentru a deveni din ce în ce mai buni.</p>
                        <p>Satisfacția unui client mulțumit este mai presus decât orice, iar faptul că oamenii revin, ne oferă o mare bucurie și certitudinea că munca noastră, ceea ce facem, facem bine.</p>
                        <h3>Suntem recunoscători tuturor celor care au avut încredere în noi!
                            Vă așteptăm cu drag în băcănia noastră să ne cunoaștem!</h3>
                    </div>
                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>
