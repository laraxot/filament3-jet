<?php

namespace ArtMin96\FilamentJet\Traits;

use ArtMin96\FilamentJet\Jobs\CreatePersonalDataExportJob;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;

/**
 * Undocumented trait
 *
 * @property ?Batch $exportBatch
 */
trait ProcessesExport
{
    public ?int $exportBatchId = null;

    public int $exportProgress = 0;

    /**
     * @throws \Throwable
     */
    public function export(): void
    {
        if (! $this->user instanceof \Spatie\PersonalDataExport\ExportsPersonalData) {
            throw new \Exception('user must implemtents Spatie\PersonalDataExport\ExportsPersonalData');
        }
        $batch = Bus::batch(new CreatePersonalDataExportJob($this->user))
            ->name('export personal data')
            ->allowFailures()
            ->dispatch();

        /**
         * @var int|null
         */
        $batch_id = (int) $batch->id;

        $this->exportBatchId = $batch_id;
    }

    public function getExportBatchProperty(): ?Batch
    {
        if (! $this->exportBatchId) {
            return null;
        }

        return Bus::findBatch((string) $this->exportBatchId);
    }

    public function updateExportProgress(): void
    {
        $this->exportProgress = $this->exportBatch->progress();
    }
}
