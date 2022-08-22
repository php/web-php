<?php

namespace phpweb\UserNotes;

class Sorter {
    private $maxVote;

    private $minVote;

    private $maxAge;

    private $minAge;

    private $voteFactor;

    private $ageFactor;

    private $voteWeight = 38;

    private $ratingWeight = 60;

    private $ageWeight = 2;

    public function sort(array &$notes) {
        // First we make a pass over the data to get the min and max values
        // for data normalization.
        $this->findMinMaxValues($notes);

        $this->voteFactor = $this->maxVote - $this->minVote
            ? (1 - .3) / ($this->maxVote - $this->minVote)
            : .5;
        $this->ageFactor = $this->maxAge - $this->minAge
            ? 1 / ($this->maxAge - $this->minAge)
            : .5;

        $this->ageFactor *= $this->ageWeight;

        // Second we loop through to calculate sort priority using the above numbers
        $this->calcSortPriority($notes);

        // Third we sort the data.
        uasort($notes, [$this, 'factorSort']);
    }

    private function calcVotePriority(array $note) {
        return ($note['score'] - $this->minVote) * $this->voteFactor + .3;
    }

    private function calcRatingPriority(array $note) {
        if ($note['total'] <= 2) {
            return 0.5;
        }

        return $note['rating'];
    }

    private function calcSortPriority(array &$notes) {
        foreach ($notes as &$note) {
            $prio = [
                'vote' => $this->calcVotePriority($note) * $this->voteWeight,
                'rating' => $this->calcRatingPriority($note) * $this->ratingWeight,
                'age' => ($note['xwhen'] - $this->minAge) * $this->ageFactor
            ];
            $note['sort'] = $prio['value'] = array_sum($prio);
        }
    }

    /*
     * Not sure why, but using `$b['sort'] - $a['sort']` does not seem to
     * work properly.
     */
    private function factorSort($a, $b) {
        if ($a['sort'] < $b['sort']) {
            return 1;
        }

        if ($a['sort'] == $b['sort']) {
            return 0;
        }

        return -1;
    }

    private function findMinMaxValues(array &$notes) {
        $count = count($notes);
        if ($count <= 0) {
            return;
        }
        $note = array_shift($notes);
        $note['score'] = $net = ($note['votes']['up'] - $note['votes']['down']);
        $note['total'] = $totalVotes = ($note['votes']['up'] + $note['votes']['down']);
        $note['rating'] = $totalVotes > 0
            ? $note['votes']['up'] / $totalVotes
            : .5;

        $this->minVote = $this->maxVote = $net;
        $this->minAge = $this->maxAge = $age = $note['xwhen'];

        $first = $note;

        foreach ($notes as &$note) {
            $note['score'] = $net = ($note['votes']['up'] - $note['votes']['down']);
            $note['total'] = $totalVotes = ($note['votes']['up'] + $note['votes']['down']);
            $note['rating'] = $totalVotes > 0
                ? $note['votes']['up'] / $totalVotes
                : .5;
            $age = $note['xwhen'];
            $this->maxVote = max($this->maxVote, $net);
            $this->minVote = min($this->minVote, $net);
            $this->maxAge = max($this->maxAge, $age);
            $this->minAge = min($this->minAge, $age);
        }
        array_unshift($notes, $first);
    }
}
