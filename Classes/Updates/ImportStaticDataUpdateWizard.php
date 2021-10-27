<?php
namespace Jambagecom\StaticInfoTablesDe\Updates;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Install\Updates\DatabaseUpdatedPrerequisite;
use TYPO3\CMS\Install\Updates\UpgradeWizardInterface;
use SJBR\StaticInfoTables\Utility\DatabaseUpdateUtility;
use SJBR\StaticInfoTables\Cache\ClassCacheManager;

class ImportStaticDataUpdateWizard implements UpgradeWizardInterface {

    /**
     * @var DatabaseUpdateUtility
     */
    protected DatabaseUpdateUtility $databaseUpdateUtility;

    /**
     * @var ClassCacheManager
     */
    protected ClassCacheManager $classCacheManager;

    public function __construct()
    {
        $this->databaseUpdateUtility = GeneralUtility::makeInstance(DatabaseUpdateUtility::class);
        $this->classCacheManager = GeneralUtility::makeInstance(ClassCacheManager::class);
    }

    public function getIdentifier(): string
    {
        return 'staticInfoTablesDe_importStaticData';
    }

    public function getTitle(): string
    {
        return 'Import static data for DE';
    }

    public function getDescription(): string
    {
        return 'Import data for static_info_tables_de';
    }

    public function executeUpdate(): bool
    {
        $this->classCacheManager->reBuild();

        $this->databaseUpdateUtility->doUpdate('static_info_tables_de');

        return true;
    }

    public function updateNecessary(): bool
    {
        $updateNeeded = false;

        // @TODO implement updatecheck - return true so far
        $updateNeeded = true;

        return $updateNeeded;
    }

    public function getPrerequisites(): array
    {
        return [
            DatabaseUpdatedPrerequisite::class
        ];
    }
}
