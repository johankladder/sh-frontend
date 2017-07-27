<?php
/**
 * Created by Johan Kladder & Sebe Jan Vogel.
 *
 * This file was created for the SH-frontend application.
 * Date: 23-5-17
 * Time: 23:01
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class OverviewController extends Controller
{

    /**
     * @Route("/overview", name="overview")
     */
    public function indexAction()
    {
        return $this->render('overview/index.html.php');
    }

    /**
     * @Route("/overview-competition", name="overview-competition")
     */
    public function competionAction() {
        return $this->render('overview/competition.html.php');
    }

    /**
     * @Route("/overview-clubs/{competition}", defaults={"competition" = 1}, name="overview-clubs")
     */
    public function clubsAction($competition)
    {

        $clubsE = [

            [
                'logo' => 'http://adodenhaag.nl/images/logos/teams/ado.png',
                'name' => 'ADO Den Haag'

            ],
            [
                'logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/7/79/Ajax_Amsterdam.svg/1200px-Ajax_Amsterdam.svg.png',
                'name' => 'Ajax'

            ],
            [
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e0/AZ_Alkmaar.svg/1200px-AZ_Alkmaar.svg.png',
                'name' => 'AZ'

            ],
            [
                'logo' => 'https://scexcelsior.nl/wp-content/themes/scexcelsior/img/logo-excelsior.png',
                'name' => 'S.B.V. Excelsior'

            ],
            [
                'logo' => 'https://www.fcgroningen.nl/websites/implementatie/website/img/FCGroningenLogo.svg',
                'name' => 'FC Groningen'
            ],
            [
                'logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/e/e3/FC_Twente.svg/814px-FC_Twente.svg.png',
                'name' => 'FC Twente'
            ],
            [
                'logo' => 'https://upload.wikimedia.org/wikipedia/en/9/92/FC_Utrecht.png',
                'name' => 'FC Utrecht'
            ],
            [
                'logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/e/e3/Feyenoord_logo.svg/600px-Feyenoord_logo.svg.png',
                'name' => 'Feyenoord'
            ],
            [
                'logo' => 'https://www.heracles.nl/sitefiles/clublogos/wedstrijdblok/heracles.png',
                'name' => 'Heracles'

            ],
            [
                'logo' => 'http://ortecsports.com/wp-content/uploads/2015/07/NAC_Breda_logo.png',
                'name' => 'NAC Breda'

            ],
            [
                'logo' => 'http://www.scpeczwolle.nl/media/1185/pec-zwolle.jpg?mode=pad&width=400&height=400',
                'name' => 'PEC Zwolle'
            ],
            [
                'logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/0/05/PSV_Eindhoven.svg/1280px-PSV_Eindhoven.svg.png',
                'name' => 'PSV'
            ],
            [
                'logo' => 'http://www.rodajc.nl/images/logo.png',
                'name' => 'Roda JC Kerkrade'
            ],
            [
                'logo' => 'https://pbs.twimg.com/profile_images/2559183443/qy6t1fiux25smagobjfi.png',
                'name' => 'SC Heerenveen'
            ],
            [
                'logo' => 'https://pbs.twimg.com/profile_images/2633146600/489dcb3677a310d9b276efcbb11892d5_400x400.png',
                'name' => 'Sparta Rotterdam'
            ],
            [
                'logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/6/60/VVV-Venlo_logo.svg/1200px-VVV-Venlo_logo.svg.png',
                'name' => 'VVV Venlo'
            ],
            [
                'logo' => 'http://www.vitesse.org/mysite/modules/VITE0100/600e61d44f03a6965ab8113aa833c5e7.png',
                'name' => 'Vitesse'
            ],
            [
                'logo' => 'https://pbs.twimg.com/profile_images/1207367387/WillemII_2767BLAUW.png',
                'name' => 'Willem II'
            ],

        ];

        $clubsJ = [
            [
                'logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/7/79/Ajax_Amsterdam.svg/1200px-Ajax_Amsterdam.svg.png',
                'name' => 'Jong Ajax'],
['logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e0/AZ_Alkmaar.svg/1200px-AZ_Alkmaar.svg.png', 'name' => 'Jong AZ'],
[ 'logo' => 'https://upload.wikimedia.org/wikipedia/en/8/86/Almere_City_FC_logo.PNG', 'name' =>'Almere City FC'],
[ 'logo' => 'http://cambuur.nl/friksbeheer/wp-content/themes/cambuur/images/logo-high.png', 'name' =>'SC Cambuur'],
[ 'logo' => 'https://s-media-cache-ak0.pinimg.com/originals/02/9e/e8/029ee8c07f7c2653ad780bd2116974aa.png', 'name' =>'De Graafschap'],
[ 'logo' => 'http://cityfans.nl/wp-content/uploads/2016/02/FC-Den-Bosch.png', 'name' =>'FC Den Bosch'],
[ 'logo' => 'http://www.clupdate.com/media/logos/knvb/fc-dordrecht.png', 'name' =>'FC Dordrecht'],
[ 'logo' => 'http://fceindhovenfutsal.nl/Images/logo.png', 'name' =>'FC Eindhoven'],
[ 'logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/8/83/FC_Emmen_logo.svg/589px-FC_Emmen_logo.svg.png', 'name' =>'FC Emmen'],
[ 'logo' => 'https://s-media-cache-ak0.pinimg.com/originals/12/b2/09/12b209703dcfab62a3c3ff5643dd2610.png', 'name' =>'Fortuna Sittard'],
[ 'logo' => 'http://www.ga-eagles.nl/wp-content/themes/ga-eagles/images/clubs/GAE.png', 'name' =>'Go Ahead Eagles'],
[ 'logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/7/79/Helmond_Sport_logo.svg/494px-Helmond_Sport_logo.svg.png', 'name' =>'Helmond Sport'],
[ 'logo' => 'http://www.mvv.nl/IManager/Media/17645/689724/NL/sec/mvv-maastricht.png', 'name' =>'MVV Maastricht'],
[ 'logo' => 'https://upload.wikimedia.org/wikipedia/en/0/08/NEC_Nijmegen.png', 'name' =>'NEC'],
[ 'logo' => 'https://vignette3.wikia.nocookie.net/logopedia/images/7/77/FC_Oss_logo.png/revision/latest?cb=20130805184900', 'name' =>'FC Oss'],
[ 'logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/0/05/PSV_Eindhoven.svg/1280px-PSV_Eindhoven.svg.png', 'name' =>'Jong PSV'],
[ 'logo' => 'https://vignette1.wikia.nocookie.net/fifa/images/d/de/RKC_Waalwijk.png/revision/latest?cb=20130904193941', 'name' =>'RKC Waalwijk'],
[ 'logo' => 'http://www.wesleyzonneveld.nl/TELSTAR_logo.png', 'name' =>'Telstar'],
[ 'logo' => 'https://upload.wikimedia.org/wikipedia/en/9/92/FC_Utrecht.png', 'name' =>'Jong FC Utrecht'],
[ 'logo' => 'http://cityfans.nl/wp-content/uploads/2016/02/FC-Volendam.png', 'name' =>'FC Volendam'],

        ];

        if($competition === 'Eredivisie') {
            $clubs = $clubsE;
        } else {
            $clubs = $clubsJ;
        }

        return $this->render('overview/clubs.html.php', [
            'clubs' => $clubs
        ]);
    }
}