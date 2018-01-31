<?php

class TemplatePageManager {
    const ReplaceMask = '###textToolza###';

    /**
     * На пустую страницу применяет конфиг
     * @param PageWrapper $pageWrapper
     * @param $templatePageConfig
     * @return PageWrapper новой страницы или пустой враппер
     */
    public function ApplyTemplatePage($pageWrapper, $templatePageConfig) {
        $pageWrapper->Status->SetStatus(StatusCodeConst::Status_200_0);
        $pageWrapper->Headers->AddHeader(HeaderConst::ContentType, 'text/html');
        $pageWrapper->Content = $this->FormContent($templatePageConfig);
        return $pageWrapper;
    }

    /**
     * @param $templatePageConfig
     * @return String
     */
    private function FormContent($templatePageConfig) {
        $content = $templatePageConfig->template;
        if (VarHelper::IsSetValue($templatePageConfig->text) && StringUtils::ContainsInsensitive($content, self::ReplaceMask)) {
            $content = str_replace(self::ReplaceMask, $templatePageConfig->text, $content);
        }
        return $content;
    }
}