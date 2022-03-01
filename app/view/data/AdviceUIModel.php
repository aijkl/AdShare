<?php

namespace Aijkl\AdShare;
class AdviceUIModel
{
    public AdviceEntity $adviceEntity;
    public UserProfileEntity $userProfileEntity;

    public function __construct(AdviceEntity $adviceEntity, UserProfileEntity $userProfileEntity)
    {
        $this->adviceEntity = $adviceEntity;
        $this->userProfileEntity = $userProfileEntity;
    }
}