<?php

namespace App\DataFixtures;

use App\Entity\Equipement;
use App\Entity\Evenements;
use App\Entity\Equipe;
use App\Entity\Reunion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // =============================================================
        // 1. DATA FIXTURES : EQUIPEMENT (20 articles)
        // =============================================================
        $equipementsData = [
            [
                'nom' => 'Appareil à gaufres double',
                'prixPlein' => 75,
                'prixMembre' => 25,
                'image' => 'picture/AppareilGauffre.png',
                'description' => 'Idéal pour vos kermesses, anniversaires ou fêtes de famille. Puissance professionnelle pour des gaufres croustillantes en quelques minutes.',
            ],
            [
                'nom' => 'Tables pliantes',
                'prixPlein' => 30,
                'prixMembre' => 10,
                'image' => 'picture/tables.jpg',
                'description' => 'Tables robustes et faciles à transporter. Parfaites pour installer vos buffets, vos banquets ou vos repas en extérieur.',
            ],
            [
                'nom' => 'Chaises pliantes (lot de 10)',
                'prixPlein' => 50,
                'prixMembre' => 15,
                'image' => 'picture/chaises.jpg',
                'description' => 'Lot de 10 chaises pliantes légères et empilables. Idéales pour accueillir confortablement tous vos invités lors de réunions ou repas.',
            ],
            [
                'nom' => 'Machine à café professionnelle',
                'prixPlein' => 40,
                'prixMembre' => 12,
                'image' => 'picture/machine_a_cafe.jpg',
                'description' => 'Machine à café performante pour préparer rapidement des boissons chaudes lors de vos réceptions et réunions.',
            ],
            [
                'nom' => 'Percolateur à café (10L)',
                'prixPlein' => 60,
                'prixMembre' => 20,
                'image' => 'picture/percolateur.jpg',
                'description' => 'Grande capacité (10 litres / ~60 tasses). Maintient le café au chaud toute la journée pour vos grands événements.',
            ],
            [
                'nom' => 'Vidéoprojecteur avec écran',
                'prixPlein' => 80,
                'prixMembre' => 30,
                'image' => 'picture/video_projecteur.jpg',
                'description' => 'Ensemble vidéoprojecteur haute définition avec écran de projection déroulant. Idéal pour vos soirées cinéma, diaporamas ou présentations.',
            ],
            [
                'nom' => 'Système de sonorisation portable',
                'prixPlein' => 100,
                'prixMembre' => 40,
                'image' => 'picture/sonorisation.jpg',
                'description' => 'Enceinte nomade puissante avec connectivité Bluetooth et entrées auxiliaires. Parfaite pour animer vos soirées et discours.',
            ],
            [
                'nom' => 'Barnum / Tente de réception (3x3m)',
                'prixPlein' => 90,
                'prixMembre' => 35,
                'image' => 'picture/barnum.jpg',
                'description' => 'Tente pliante 3x3m facile à monter. Idéale pour vous abriter du soleil ou des intempéries lors de vos événements en extérieur.',
            ],
            [
                'nom' => 'Friteuse professionnelle',
                'prixPlein' => 85,
                'prixMembre' => 30,
                'image' => 'picture/friteuse.jpg',
                'description' => 'Friteuse électrique grande capacité. Parfaite pour servir des frites chaudes et croustillantes en grande quantité.',
            ],
            [
                'nom' => 'Crêpière double',
                'prixPlein' => 65,
                'prixMembre' => 20,
                'image' => 'picture/crepiere.jpg',
                'description' => 'Double plaque de cuisson professionnelle pour réaliser rapidement de délicieuses crêpes sucrées ou salées.',
            ],
            [
                'nom' => 'Machine à Pop-corn',
                'prixPlein' => 55,
                'prixMembre' => 18,
                'image' => 'picture/machine_a_popcorn.jpg',
                'description' => 'Machine style rétro pour faire du pop-corn frais et chaud. Succès garanti auprès des enfants et des grands !',
            ],
            [
                'nom' => 'Machine à Barbe à Papa',
                'prixPlein' => 55,
                'prixMembre' => 18,
                'image' => 'picture/barbe_a_papa.jpg',
                'description' => 'Appareil simple d\'utilisation pour apporter une touche festive et gourmande à toutes vos kermesses et fêtes d\'anniversaire.',
            ],
            [
                'nom' => 'Lot de jeux en bois géants',
                'prixPlein' => 70,
                'prixMembre' => 25,
                'image' => 'picture/jeux_en_bois.jpg',
                'description' => 'Sélection de jeux traditionnels en bois grand format pour divertir les invités de tout âge dans une ambiance conviviale.',
            ],
            [
                'nom' => 'Assortiment de costumes enfants',
                'prixPlein' => 45,
                'prixMembre' => 15,
                'image' => 'picture/costumes.jpg',
                'description' => 'Malle garnie de déguisements variés pour enfants (super-héros, princesses, animaux...). Idéal pour Carnaval ou anniversaires.',
            ],
            [
                'nom' => 'Matériel Karaoké avec micros',
                'prixPlein' => 70,
                'prixMembre' => 25,
                'image' => 'picture/karaoke.jpg',
                'description' => 'Kit karaoké complet avec micros sans fil et système de connexion pour chanter et mettre l\'ambiance jusqu\'au bout de la nuit.',
            ],
            [
                'nom' => 'Jeu de société géant "Congresso"',
                'prixPlein' => 40,
                'prixMembre' => 12,
                'image' => 'picture/congresso.jpg',
                'description' => 'Jeu de stratégie et d\'adresse sur grand plateau. Une animation ludique et originale pour les groupes.',
            ],
            [
                'nom' => 'Fontaine à chocolat',
                'prixPlein' => 35,
                'prixMembre' => 10,
                'image' => 'picture/fontaine_chocolat.jpg',
                'description' => 'Cascade de chocolat fondu pour enrober fruits, guimauves et biscuits. Une animation dessert spectaculaire et gourmande.',
            ],
            [
                'nom' => 'Chauffage d\'extérieur (parasol chauffant)',
                'prixPlein' => 95,
                'prixMembre' => 35,
                'image' => 'picture/chauffage_exterieur.jpg',
                'description' => 'Parasol chauffant puissant pour prolonger vos soirées en extérieur même lorsque les températures rafraîchissent.',
            ],
            [
                'nom' => 'Microphone sans fil',
                'prixPlein' => 25,
                'prixMembre' => 8,
                'image' => 'picture/micro_sans_fil.jpg',
                'description' => 'Micro récepteur haute qualité avec longue portée. Indispensable pour vos présentations, discours ou animations.',
            ],
            [
                'nom' => 'Tireuse à bière (fûts 5L)',
                'prixPlein' => 60,
                'prixMembre' => 20,
                'image' => 'picture/tires_bieres.jpg',
                'description' => 'Tireuse compatible fûts de 5L avec système de refroidissement intégré. Garde la bière fraîche tout au long de votre événement.',
            ],
        ];

        foreach ($equipementsData as $data) {
            $equipement = new Equipement();
            $equipement->setNom($data['nom']);
            $equipement->setPrixPlein($data['prixPlein']);
            $equipement->setPrixMembre($data['prixMembre']);
            $equipement->setImage($data['image']);
            $equipement->setDescription($data['description']);
            $equipement->setEncoreDisponible(true);

            $manager->persist($equipement);
        }

        // =============================================================
        // 2. DATA FIXTURES : EVENEMENTS
        // =============================================================
        $evenementsData = [
            [
                'titre' => 'Assemblée générale',
                'description' => 'Bilan sur l\'année écoulée, partager nos projets, échanger ensemble.',
                'dateDebut' => new \DateTime('2025-09-27 19:00:00'),
                'dateFin' => null,
                'lieu' => 'L\'Île-d\'Elle',
                'lienEvent' => 'https://www.facebook.com/events/2212154319304162/',
            ],
            [
                'titre' => 'Madeleine Bijou',
                'description' => 'Faites vous plaisir et commandez de délicieuses gourmandises.',
                'dateDebut' => new \DateTime('2025-10-07 14:00:00'),
                'dateFin' => new \DateTime('2025-10-07 16:00:00'),
                'lieu' => 'L\'Île-d\'Elle',
                'lienEvent' => null,
            ],
            [
                'titre' => 'Halloween - Chasse aux bonbons',
                'description' => 'Chasse aux bonbons en famille en totale autonomie.',
                'dateDebut' => new \DateTime('2025-10-31 15:00:00'),
                'dateFin' => null,
                'lieu' => 'L\'Île-d\'Elle',
                'lienEvent' => 'https://www.facebook.com/events/1080715587369519/',
            ],
            [
                'titre' => 'Halloween - Chemin de la peur',
                'description' => 'Envie de frissonner ? Entre amis ou en famille, venez vous faire peur !',
                'dateDebut' => new \DateTime('2025-11-01 20:15:00'),
                'dateFin' => null,
                'lieu' => 'L\'Île-d\'Elle',
                'lienEvent' => 'https://www.facebook.com/events/1265312185373435/',
            ],
            [
                'titre' => 'Fête de Noël',
                'description' => 'Spectacle organisé par l\'école, accompagné par l\'Amicale Laïque.',
                'dateDebut' => new \DateTime('2025-12-12 18:45:00'),
                'dateFin' => null,
                'lieu' => 'L\'Île-d\'Elle',
                'lienEvent' => 'https://www.facebook.com/events/704151322740844/',
            ],
            [
                'titre' => 'Loto',
                'description' => 'Venez vous amusez avec nous et tentez de gagner le gros lot ! Animé par Stanislas.',
                'dateDebut' => new \DateTime('2026-02-14 18:30:00'),
                'dateFin' => null,
                'lieu' => 'L\'Île-d\'Elle',
                'lienEvent' => 'https://www.facebook.com/events/1254313693219467/',
            ],
            [
                'titre' => 'St Patrick',
                'description' => 'Une bonne soirée entre amis ou en famille devant un bon match de rugby.',
                'dateDebut' => new \DateTime('2026-03-14 19:30:00'),
                'dateFin' => null,
                'lieu' => 'L\'Île-d\'Elle',
                'lienEvent' => 'https://www.facebook.com/events/1571126067277750',
            ],
            [
                'titre' => 'Chasse aux œufs de Pâques',
                'description' => 'À vos paniers ! Vite ou il n\'en restera plus. En binôme avec l\'école St Hilaire.',
                'dateDebut' => new \DateTime('2026-04-04 10:00:00'),
                'dateFin' => null,
                'lieu' => 'L\'Île-d\'Elle',
                'lienEvent' => 'https://www.facebook.com/events/1666116494750946',
            ],
            [
                'titre' => 'Vide Greniers',
                'description' => 'Besoin de désencombrer la maison ? Vendez ce dont vous n\'avez plus besoin !',
                'dateDebut' => new \DateTime('2026-05-10 06:00:00'),
                'dateFin' => new \DateTime('2026-05-10 18:00:00'),
                'lieu' => 'L\'Île-d\'Elle',
                'lienEvent' => 'https://www.facebook.com/events/1168174848581147',
            ],
            [
                'titre' => 'Fête de l\'école',
                'description' => 'Spectacles, stands de jeux, buvette, snack. Pour fêter la fin d\'année ensemble.',
                'dateDebut' => new \DateTime('2026-06-20 14:00:00'),
                'dateFin' => null,
                'lieu' => 'L\'Île-d\'Elle',
                'lienEvent' => 'https://www.facebook.com/events/1644103273284926',
            ],
            [
                'titre' => 'Fête de la musique',
                'description' => 'Restez avec nous pour partager un moment joyeux et convivial tout en musique.',
                'dateDebut' => new \DateTime('2026-06-20 19:00:00'),
                'dateFin' => null,
                'lieu' => 'L\'Île-d\'Elle',
                'lienEvent' => 'https://www.facebook.com/events/2003225197259131',
            ],
            [
                'titre' => 'Voyage Extra-Scolaire',
                'description' => 'Voyage tout frais payé offert pour les enfants de CM1 & CM2 de l\'école Jacques Prévert.',
                'dateDebut' => new \DateTime('2026-06-27 07:00:00'),
                'dateFin' => null,
                'lieu' => 'L\'Île-d\'Elle',
                'lienEvent' => null,
            ],
        ];

        foreach ($evenementsData as $data) {
            $evenement = new Evenements();
            $evenement->setTitre($data['titre']);
            $evenement->setDescription($data['description']);
            $evenement->setDateDebut($data['dateDebut']);
            $evenement->setDateFin($data['dateFin']);
            $evenement->setLieu($data['lieu']);
            $evenement->setLienEvent($data['lienEvent']);

            $manager->persist($evenement);
        }

        // =============================================================
        // 3. DATA FIXTURES : REUNIONS (3 comptes rendus)
        // =============================================================
        $reunionsData = [
            [
                'titre' => 'Réunion du 15 Octobre 2026',
                'date' => new \DateTime('2026-10-15'),
                'texte' => "Lors de cette réunion, nous avons discuté des projets à venir pour l'année 2026. Les membres ont proposé plusieurs idées pour améliorer nos activités et renforcer la communauté.",
            ],
            [
                'titre' => 'Réunion du 02 Novembre 2026',
                'date' => new \DateTime('2026-11-02'),
                'texte' => "Compte-rendu : validation du budget, choix des intervenants, organisation du matériel, logistique de la salle et préparation de la communication globale pour l'événement de fin d'année.",
            ],
            [
                'titre' => 'Réunion du 20 Novembre 2026',
                'date' => new \DateTime('2026-11-20'),
                'texte' => 'Bilan rapide de la session précédente.',
            ],
        ];

        foreach ($reunionsData as $data) {
            $reunion = new Reunion();
            $reunion->setTitre($data['titre']);
            $reunion->setDate($data['date']);
            $reunion->setTexte($data['texte']);

            $manager->persist($reunion);
        }

        // =============================================================
        // 4. DATA FIXTURES : EQUIPE (16 membres)
        // =============================================================
        $membresEquipeData = [
            [
                'nom' => 'Laurène',
                'role' => 'Présidente',
                'description' => 'Présidente de l\'association depuis 4 ans, elle porte la vision et les valeurs du collectif. Véritable couteau suisse, elle coordonne l\'équipe, accompagne les projets et veille à ce que chacun(e) trouve sa place, dans un esprit de partage, d\'écoute et de bienveillance.',
                'photoProfil' => 'picture/pp.png',
            ],
            [
                'nom' => 'Jessica',
                'role' => 'Secrétaire',
                'description' => 'Secrétaire de l\'association depuis 3 ans, elle est un vrai soutien au quotidien. Organisée, elle s\'occupe des comptes rendus, aide à structurer les tâches, fait le lien avec les partenaires locaux et cherche toujours des solutions pratiques pour le bien du collectif.',
                'photoProfil' => 'picture/pp.png',
            ],
            [
                'nom' => 'Andreia',
                'role' => 'Trésorière',
                'description' => 'Trésorière présente depuis quelques années, elle s\'occupe de la gestion financière : factures, suivi des comptes et bilans financiers de chaque évènement. Elle met son expérience et ses conseils au service du collectif.',
                'photoProfil' => 'picture/pp.png',
            ],
            [
                'nom' => 'Clovis',
                'role' => 'Membre du CA',
                'description' => 'Membre du conseil d\'administration depuis 3 ans, il apporte son expérience et son regard extérieur. Indépendant, il contribue aux réflexions sur la communication et la visibilité. Bricoleur toujours à l\'affût des bonnes affaires, il a aussi pour mission les achats lors des évènements.',
                'photoProfil' => 'picture/pp.png',
            ],
            [
                'nom' => 'Nicolas',
                'role' => 'Membre du CA',
                'description' => 'Membre du conseil d\'administration depuis 2 ans, il apporte régulièrement des idées précieuses pour l\'organisation des évènements. Il s\'occupe de l\'impression des flyers et affiches. Bricoleur et créatif, il est toujours partant pour fabriquer des décors.',
                'photoProfil' => 'picture/pp.png',
            ],
            [
                'nom' => 'Mathilde',
                'role' => 'Membre du CA',
                'description' => 'Membre du conseil d\'administration depuis 2 ans, elle est une vraie source de créativité pour l\'association. Son expérience en magasin d\'articles de fête lui permet d\'apporter des astuces originales pour nos évènements, toujours dans la bonne humeur.',
                'photoProfil' => 'picture/pp.png',
            ],
            [
                'nom' => 'Anne Charlotte',
                'role' => 'Membre du CA',
                'description' => 'Membre du conseil d\'administration, c\'est une vraie source de créativité pour l\'asso. Toujours pleine d\'idées pour la déco et les DIY, elle aime trouver des solutions originales et mettre ses talents au service du collectif avec enthousiasme.',
                'photoProfil' => 'picture/pp.png',
            ],
            [
                'nom' => 'Franck',
                'role' => 'Bénévole',
                'description' => 'Bénévole régulier, il est un précieux allié lors de chaque évènement. Bricoleur et débrouillard, il aide pour la fabrication des décors et tout ce qui demande un coup de main pratique, toujours dans la bonne humeur.',
                'photoProfil' => 'picture/pp.png',
            ],
            [
                'nom' => 'Freddy',
                'role' => 'Membre du CA',
                'description' => 'Membre du conseil d\'administration depuis plus de 15 ans, c\'est un peu notre sage. Il apporte souvenirs et conseils des animations passées. Bricoleur et créatif, il garde une vraie âme d\'enfant, prêt à donner un coup de main avec une énergie débordante.',
                'photoProfil' => 'picture/pp.png',
            ],
            [
                'nom' => 'Daniel',
                'role' => 'Membre du CA',
                'description' => 'Membre du conseil d\'administration depuis 4 ans, il apporte sa connaissance historique de la commune. Il veille au respect des règles et autorisations, apportant son expertise pratique à chaque projet, et contribue à la Gazette Marandaisse.',
                'photoProfil' => 'picture/pp.png',
            ],
            [
                'nom' => 'René',
                'role' => 'Bénévole',
                'description' => 'Bénévole régulier, il est fidèle et toujours prêt à donner un coup de main. Présent pour la mise en place des évènements et le jour J, il apporte son aide et son soutien à chaque occasion.',
                'photoProfil' => 'picture/pp.png',
            ],
            [
                'nom' => 'José',
                'role' => 'Membre du CA',
                'description' => 'Membre du conseil d\'administration depuis plus de 15 ans, il est notre expert de la buvette. Toujours souriant et très à l\'aise, il contribue activement à la mise en place des évènements.',
                'photoProfil' => 'picture/pp.png',
            ],
            [
                'nom' => 'Siham',
                'role' => 'Membre du CA',
                'description' => 'Membre du conseil d\'administration, elle apporte son aide précieuse pour la décoration, la mise en place des évènements, ainsi que la préparation et le service, toujours avec bonne humeur.',
                'photoProfil' => 'picture/pp.png',
            ],
            [
                'nom' => 'Romain & José',
                'role' => 'Bénévoles',
                'description' => 'Bénévoles ponctuels impliqués, ils apportent leur aide pour le bricolage et la fabrication lors des évènements, toujours prêts à donner un coup de main à l\'association.',
                'photoProfil' => 'picture/pp.png',
            ],
            [
                'nom' => 'Sabrina',
                'role' => 'Membre du CA',
                'description' => 'Membre du conseil d\'administration, elle a beaucoup contribué à l\'association par son aide pour les préparatifs et l\'accueil. Bien qu\'elle ne puisse plus être présente, nous soulignons son engagement passé et sa générosité.',
                'photoProfil' => 'picture/pp.png',
            ],
            [
                'nom' => 'Enzo',
                'role' => 'Bénévole',
                'description' => 'Bénévole régulier, c\'est un jeune membre très investi. Toujours partant pour aider lors de la fabrication des décors, il apporte son enthousiasme, sa motivation et sa fraîcheur à l\'association.',
                'photoProfil' => 'picture/pp.png',
            ],
        ];

        foreach ($membresEquipeData as $data) {
            $membre = new Equipe();
            $membre->setNom($data['nom']);
            $membre->setRole($data['role']);
            $membre->setDescription($data['description']);
            $membre->setPhotoProfil($data['photoProfil']);

            $manager->persist($membre);
        }

        // Envoi de toutes les entités en base de données
        $manager->flush();
    }
}