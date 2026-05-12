<?php
/**
 * Framework Controller
 */
class FrameworkController extends Controller {
    public function __construct() {
        parent::__construct();
        $this->checkAuth();
    }

    /**
     * Show framework COBIT
     */
    public function index() {
        $data = [
            'apo12' => $this->getAPO12(),
            'apo13' => $this->getAPO13()
        ];

        $this->view('framework/index', $data);
    }

    /**
     * APO12 - Manage Risk
     */
    private function getAPO12() {
        return [
            'name' => 'APO12 - Manage Risk',
            'description' => 'Pengelolaan risiko TI yang tepat untuk memastikan tujuan organisasi TI tercapai.',
            'objectives' => [
                'Memahami konteks risiko organisasi dan TI',
                'Mengidentifikasi dan menganalisis risiko',
                'Merespons risiko dengan cara yang sesuai (mitigasi, transfer, penerimaan, atau penghindaran)',
                'Memantau risiko secara berkelanjutan'
            ],
            'processes' => [
                'APO12.01 - Collect data',
                'APO12.02 - Analyze risk',
                'APO12.03 - Maintain a risk profile',
                'APO12.04 - Articulate risk',
                'APO12.05 - Define risk management strategy',
                'APO12.06 - Respond to risk'
            ]
        ];
    }

    /**
     * APO13 - Manage Security
     */
    private function getAPO13() {
        return [
            'name' => 'APO13 - Manage Security',
            'description' => 'Pengelolaan keamanan informasi untuk melindungi data dan sistem organisasi.',
            'objectives' => [
                'Memahami persyaratan keamanan informasi',
                'Mengidentifikasi dan mengklasifikasikan informasi',
                'Mengarahkan, mengimplementasikan, dan memantau keamanan informasi',
                'Mengelola identitas dan akses'
            ],
            'processes' => [
                'APO13.01 - Establish information security policies',
                'APO13.02 - Identify and classify information',
                'APO13.03 - Determine information security responsibilities',
                'APO13.04 - Manage user identity and logical access',
                'APO13.05 - Manage physical access',
                'APO13.06 - Manage vendor relationships',
                'APO13.07 - Manage security awareness'
            ]
        ];
    }
}
?>