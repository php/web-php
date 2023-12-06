<?php

namespace phpweb\UserNotes;

class Sorter
{
    private $maxVote;

    private $minVote;

    private $maxAge;

    private $minAge;

    private $voteFactor;

    private $ageFactor;

    private $voteWeight = 38;

    private $ratingWeight = 60;

    private $ageWeight = 2;

    /**
     * @param array<string, UserNote> $notes
     */
    public function sort(array &$notes):void {
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
        $prio = $this->calcSortPriority($notes);

        // Third we sort the data.
        uasort($notes, function ($a, $b) use ($prio) {
            return $prio[$b->id] <=> $prio[$a->id];
        });
    }

    private function calcVotePriority(UserNote $note):float {
        return ($note->upvotes - $note->downvotes - $this->minVote) * $this->voteFactor + .3;
    }

    private function calcRatingPriority(UserNote $note):float {
        return $note->upvotes + $note->downvotes <= 2 ? 0.5 : $this->calcRating($note);
    }

    private function calcRating(UserNote $note):float {
        $totalVotes = $note->upvotes + $note->downvotes;
        return $totalVotes > 0 ? $note->upvotes / $totalVotes : .5;
    }

    /**
     * @param array<string, UserNote> $notes
     */
    private function calcSortPriority(array $notes): array {
        $prio = [];
        foreach ($notes as $note) {
            $prio[$note->id] = ($this->calcVotePriority($note) * $this->voteWeight)
                + ($this->calcRatingPriority($note) * $this->ratingWeight)
                + (($note->ts - $this->minAge) * $this->ageFactor);
        }
        return $prio;
    }

    /**
     * @param array<string, UserNote> $notes
     */
    private function findMinMaxValues(array $notes):void {
        if ($notes === []) {
            return;
        }

        $first = array_shift($notes);

        $this->minVote = $this->maxVote = ($first->upvotes - $first->downvotes);
        $this->minAge = $this->maxAge = $first->ts;

        foreach ($notes as $note) {
            $this->maxVote = max($this->maxVote, ($note->upvotes - $note->downvotes));
            $this->minVote = min($this->minVote, ($note->upvotes - $note->downvotes));
            $this->maxAge = max($this->maxAge, $note->ts);
            $this->minAge = min($this->minAge, $note->ts);
        }
    }
}
