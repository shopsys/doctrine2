<?php

namespace Doctrine\ORM\Internal\Hydration;

class DqlAliasTreeWalker {
    private function getDqlAliasLevel($dqlAlias, $parentAliasMap, &$levelsCache) {
        if (!isset($levelsCache[$dqlAlias])) {
            if (!isset($parentAliasMap[$dqlAlias])) {
                return 0;
            } else {
                return $this->getDqlAliasLevel($parentAliasMap[$dqlAlias], $parentAliasMap, $levelsCache) + 1;
            }
        }
        return $levelsCache[$dqlAlias];
    }
    public function getDqlAliasesOrderedByLevel($dqlAliases, $parentAliasMap) {
        $dqlAliasesByLevel = [];
        $levelsCache = [];
        foreach ($dqlAliases as $dqlAlias) {
            $level = $this->getDqlAliasLevel($dqlAlias, $parentAliasMap, $levelsCache);
            $dqlAliasesByLevel[$level][] = $dqlAlias;
        }
        $dqlAliasesOrderedByLevel = [];
        for ($level = 0; isset($dqlAliasesByLevel[$level]); $level++) {
            foreach ($dqlAliasesByLevel[$level] as $dqlAliases) {
                $dqlAliasesOrderedByLevel[] = $dqlAliases;
            }
        }
        return $dqlAliasesOrderedByLevel;
    }
}