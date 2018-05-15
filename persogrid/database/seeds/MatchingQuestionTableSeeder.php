<?php

use Illuminate\Database\Seeder;
use App\MatchingQuestion;

class MatchingQuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $q01 = new MatchingQuestion();
        $q01->question= 'Bist du derzeit in einer Beziehung?';
        $q01->userType = 'applicant';
        $q01->type = 'relation';
        $q01->save();

        $q02 = new MatchingQuestion();
        $q02->question= 'Ist diese Beziehung bereits länger als 3 Jahre?';
        $q02->userType = 'applicant';
        $q02->type = 'relation';
        $q02->save();

        $q03 = new MatchingQuestion();
        $q03->question= 'Bist du derzeit fest angestellt?';
        $q03->userType = 'applicant';
        $q03->type = 'workenvironment';
        $q03->save();

        $q04 = new MatchingQuestion();
        $q04->question= 'Bist du zufrieden mit deinem Job?';
        $q04->userType = 'applicant';
        $q04->type = 'workenvironment';
        $q04->save();

        $q05 = new MatchingQuestion();
        $q05->question= 'Bist du derzeit auf der Suche nach einem Arbeitgeber?';
        $q05->userType = 'applicant';
        $q05->type = 'workenvironment';
        $q05->save();

        $q06 = new MatchingQuestion();
        $q06->question= 'Bist du derzeit am studieren oder machst eine andere Ausbildung? ';
        $q06->userType = 'applicant';
        $q06->type = 'workenvironment';
        $q06->save();

        $q07 = new MatchingQuestion();
        $q07->question= 'Suchst du in den nächste 3-6 Monate einen neuen Arbeitgeber?';
        $q07->userType = 'applicant';
        $q07->type = 'workenvironment';
        $q07->save();

        $q08 = new MatchingQuestion();
        $q08->question= 'Suchst duin den nächsten 6-12 Monate einen neuen Arbeitgeber?';
        $q08->userType = 'applicant';
        $q08->type = 'workenvironment';
        $q08->save();

        $q09 = new MatchingQuestion();
        $q09->question= 'Fühlst du dich in deinem jetzigen Job wertgeschätzt?';
        $q09->userType = 'applicant';
        $q09->type = 'workenvironment';
        $q09->save();

        $q10 = new MatchingQuestion();
        $q10->question= 'Fühlst du dich mit deinem jetzigen Arbeitsumfeld wohl?';
        $q10->userType = 'applicant';
        $q10->type = 'workenvironment';
        $q10->save();

        $q11 = new MatchingQuestion();
        $q11->question= 'Wünscht du dir mehr Entgelt für deine Arbeitszeit?';
        $q11->userType = 'applicant';
        $q11->type = 'workenvironment';
        $q11->save();

        $q12 = new MatchingQuestion();
        $q12->question= 'Würdest du deinen Arbeitgeber wechseln, wenn duein gutes Angebot bekommst?';
        $q12->userType = 'applicant';
        $q12->type = 'workenvironment';
        $q12->save();

        $q13 = new MatchingQuestion();
        $q13->question= 'Machst du wöchentlich Sport?';
        $q13->userType = 'applicant';
        $q13->type = 'happiness';
        $q13->save();

        $q14 = new MatchingQuestion();
        $q14->question= 'Bist du derzeit zufrieden mit deinem Leben?';
        $q14->userType = 'applicant';
        $q14->type = 'happiness';
        $q14->save();

        $q15 = new MatchingQuestion();
        $q15->question= 'Würdest du derzeit etwas an deinem Leben ändern wollen?';
        $q15->userType = 'applicant';
        $q15->type = 'happiness';
        $q15->save();

        $q16 = new MatchingQuestion();
        $q16->question= 'Achtest du auf deine Ernährung?';
        $q16->userType = 'applicant';
        $q16->type = 'happiness';
        $q16->save();

        $q17 = new MatchingQuestion();
        $q17->question= 'Hast du schon mal in einem Team eine kreative Lösung vorgeschlagen?';
        $q17->userType = 'applicant';
        $q17->type = 'creativity';
        $q17->save();

        $q18 = new MatchingQuestion();
        $q18->question= 'Würdest du dich als flexible bezeichnen?';
        $q18->userType = 'applicant';
        $q18->type = 'flexibility';
        $q18->save();

        $q19 = new MatchingQuestion();
        $q19->question= 'Würdest du deinen aktuellen Wohnort verändern, um eine neue Position anzunehmen?';
        $q19->userType = 'applicant';
        $q19->type = 'flexibility';
        $q19->save();

        $q20 = new MatchingQuestion();
        $q20->question= 'Würdest du deine Umgebung verändern, um einen Traumjob anzunehmen?';
        $q20->userType = 'applicant';
        $q20->type = 'flexibility';
        $q20->save();

        $q21 = new MatchingQuestion();
        $q21->question= 'Kannst du kurzfristige Entscheidungen treffen?';
        $q21->userType = 'applicant';
        $q21->type = 'flexibility';
        $q21->save();

        $q22 = new MatchingQuestion();
        $q22->question= 'Warst du schon mal im Ausland?';
        $q22->userType = 'applicant';
        $q22->type = 'flexibility';
        $q22->save();

        $q23 = new MatchingQuestion();
        $q23->question= 'Warst du schon mal im Ausland?';
        $q23->userType = 'applicant';
        $q23->type = 'flexibility';
        $q23->save();

        $q24 = new MatchingQuestion();
        $q24->question= 'Warst du schon mal im Ausland?';
        $q24->userType = 'applicant';
        $q24->type = 'flexibility';
        $q24->save();

        $q25 = new MatchingQuestion();
        $q25->question= 'Hast du schon mal eine Zeit im Ausland verbracht?';
        $q25->userType = 'applicant';
        $q25->type = 'flexibility';
        $q25->save();

        $q26 = new MatchingQuestion();
        $q26->question= 'Hast du eine Ausbildung in unterschiedlichen Berufen?';
        $q26->userType = 'applicant';
        $q26->type = 'flexibility';
        $q26->save();

        $q27 = new MatchingQuestion();
        $q27->question= 'Sind Sie derzeit zufrieden mit Ihren Mitarbeitern?';
        $q27->userType = 'business';
        $q27->type = '';
        $q27->save();

        $q28 = new MatchingQuestion();
        $q28->question= 'Sind Sie derzeit auf der Suche nach neuen Mitarbeitern?';
        $q28->userType = 'business';
        $q28->type = '';
        $q28->save();

        $q29 = new MatchingQuestion();
        $q29->question= 'Suchen Sie in den nächsten 3-6 Monaten nach einen neuen Mitarbeiter?';
        $q29->userType = 'business';
        $q29->type = '';
        $q29->save();

        $q30 = new MatchingQuestion();
        $q30->question= 'Suchen Sie in den nächsten 6-12 Monaten nach einen neuen Mitarbeiter?';
        $q30->userType = 'business';
        $q30->type = '';
        $q30->save();

        $q31 = new MatchingQuestion();
        $q31->question= 'Erhalten Sie die gewünschte Leistung von ihren Mitarbeitern?';
        $q31->userType = 'business';
        $q31->type = '';
        $q31->save();

        $q32 = new MatchingQuestion();
        $q32->question= 'Würden Sie sich als flexibel bezeichnen?';
        $q32->userType = 'business';
        $q32->type = '';
        $q32->save();

        $q33 = new MatchingQuestion();
        $q33->question= 'Würden Sie eine neue Stadt erschließen, wenn sich die Gelegenheit dazu bietet? ';
        $q33->userType = 'business';
        $q33->type = '';
        $q33->save();

        $q34 = new MatchingQuestion();
        $q34->question= 'Gibt esin Ihrem Unternehmen Incentives für Leistungen?';
        $q34->userType = 'business';
        $q34->type = '';
        $q34->save();

        $q35 = new MatchingQuestion();
        $q35->question= 'Bieten Sie in Ihrem Unternehmen Benefits an?';
        $q35->userType = 'business';
        $q35->type = '';
        $q35->save();

    }
}
