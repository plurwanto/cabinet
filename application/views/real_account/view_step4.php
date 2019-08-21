<?php
if (!empty($show)) {
    $doc_number = $show->document_number;
    $confirm_accept = $show->step4_accept;
    $checked = ($confirm_accept == "1" ? " checked " : "");
}
?>

<div class="row">
    <div class="col-sm-12">
        <?php echo $this->session->flashdata('msg');?>
    </div>
</div>
<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">New Account Request</h4>
                </div>
                <div class="panel-body">
                    <!-- start: WIZARD ACCOUNTS -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="POST" name="frm4" id="frm4" class="smart-wizard">
                                    <div id="wizard" class="swMain">
                                        <!-- start: WIZARD SEPS -->
                                        <ul>
                                            <li>
                                                <a href="#step1" class="selected">
                                                    <div class="stepNumber">
                                                        1
                                                    </div>
                                                    <span class="stepDesc"><small> Step 1 </small></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step2_1" class="selected">
                                                    <div class="stepNumber">
                                                        2.1
                                                    </div>
                                                    <span class="stepDesc"> <small> Step 2.1 </small></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step2_2" class="selected">
                                                    <div class="stepNumber">
                                                        2.2
                                                    </div>
                                                    <span class="stepDesc"> <small> Step 2.2 </small></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step3" class="selected">
                                                    <div class="stepNumber">
                                                        3
                                                    </div>
                                                    <span class="stepDesc"> <small> Step 3 </small> </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step4" class="selected">
                                                    <div class="stepNumber animated tada">
                                                        4
                                                    </div>
                                                    <span class="stepDesc"> <small> Step 4 </small> </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step5">
                                                    <div class="stepNumber">
                                                        5
                                                    </div>
                                                    <span class="stepDesc"> <small> Step 5 </small> </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step6">
                                                    <div class="stepNumber">
                                                        6
                                                    </div>
                                                    <span class="stepDesc"> <small> Step 6 </small> </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step7">
                                                    <div class="stepNumber">
                                                        7
                                                    </div>
                                                    <span class="stepDesc"> <small> Step 7 </small> </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step8">
                                                    <div class="stepNumber">
                                                        8
                                                    </div>
                                                    <span class="stepDesc"> <small> Step 8 </small> </span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="row">
                                            <input type="hidden" name="new_doc" id="new_doc" value="<?=$kode;?>">
                                            <input type="hidden" name="old_doc" id="old_doc" value="<?=$doc_number;?>">

                                            <!-- Mini dan Regular -->
                                            <div class="row" id="107BPK042">
                                                <div class="col-md-8 col-sm-6">Formulir Nomor 107.BPK.04.2</div> 
                                                <div class="col-md-4 col-sm-6">
                                                    <table class="table">
                                                        <tr>
                                                            <td>Lampiran</td>
                                                            <td>:</td>
                                                            <td>Peraturan Kepala Badan Pengawas</td>
                                                        </tr>
                                                        <tr>

                                                            <td colspan="2">&nbsp;</td>
                                                            <td>Perdagangan Berjangka Komoditi</td>
                                                        </tr>
                                                        <tr>

                                                            <td colspan="2">&nbsp;</td>
                                                            <td>Nomor: 107/BAPPEBTI/PER/11/2013</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <p class="text-center"><strong>DOKUMEN PEMBERITAHUAN ADANYA RESIKO</strong></p>
                                                    <p class="text-center"><strong>YANG HARUS DISAMPAIKAN OLEH PIALANG BERJANGKA</strong></p>
                                                    <p class="text-center"><strong>UNTUK TRANSAKSI KONTRAK DERIVATIF DALAM</strong></p>
                                                    <p class="text-center"><strong>SISTEM PERDAGANGAN ALTERNATIF</strong></p>
                                                    <p class="text-center"><span class="labeling">
                                                            RISK DISCLOSURE DOCUMENTS WHICH SHALL BE SUBMITTED BY FUTURES<br />
                                                            BROKER FOR DERIVATIVE TRANSACTIONS CONTRACT<br />
                                                            IN THE ALTERNATIVE TRADING SYSTEM</span></p>
                                                    <p>&nbsp;</p>
                                                    <p>&nbsp;</p>
                                                    <p>
                                                        Dokumen Pemberitahuan Adanya Risiko ini disampaikan kepada anda sesuai dengan Pasal 50 ayat (2) Undang-Undang Nomor 32 Tahun 1997 
                                                        tentang Perdagangan Berjangka Komoditi sebagaimana telah diubah dengan Undang-Undang Nomor 10 Tahun 2011 
                                                        tentang Perubahan Atas Undang-Undang Nomor 32 Tahun 1997 Tentang Perdagangan Berjangka Komoditi
                                                        <br /><span class="labeling">Risk Disclosure document are presented to you in accordance with Article 50 paragraph (2) of Act Number 32 Year 1997 regarding the Commodity Futures Trading as amended by Act Number 10 of 2011 on the Amendment to Law Number 32 Year 1997 on Trade Commodity Futures.</span>
                                                    </p>
                                                    <p>
                                                        Maksud dokumen ini adalah memberitahukan bahwa kemungkinan kerugian atau keuntungan
                                                        dalam perdagangan Kontrak Derivatif dalam Sistem Perdagangan Alternatif
                                                        bisa mencapai jumlah yang sangat besar. Oleh karena itu,
                                                        anda harus berhati-hati dalam memutuskan untuk melakukan transaksi,
                                                        apakah kondisi keuangan anda mencukupi.
                                                        <br /><span class="labeling">The intention of this document is to inform of the possible losses or gains in Derivative Contracts trading in the Alternative Trading System which can reach a very large number. Therefore, you should be careful in deciding to make a transaction, if your financial condition is sufficient.</span>
                                                    </p>
                                                    <p>&nbsp;</p>
                                                    <p>&nbsp;</p>
                                                </div>
                                                <div class="col-md-12 col-sm-12 table-responsive">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td>1</td>
                                                            <td colspan="2">
                                                                <p><strong>Perdagangan Kontrak Derivatif dalam Sistem Perdagangan Alternatif belum tentu layak bagi semua investor.</strong> Anda dapat menderita kerugian dalam jumlah besar dan dalam jangka waktu singkat. Jumlah kerugian uang dimungkinkan dapat melebihi jumlah uang yang pertama kali Anda setor (Margin awal) ke Pialang Berjangka Anda.
                                                                    <br/><span class="labeling">Derivative Contracts Trading in the Alternative Trading System is not necessarily eligible for all investors. You could lose money in large quantities and in a short time period. The amount of money possible losses may exceed the amount of money you initially deposited (Initial Margin) to your Broker.</span>
                                                                </p>
                                                                <p>Anda mungkin menderita kerugian seluruh Margin dan Margin tambahan yang ditempatkan pada Pialang Berjangka untuk mempertahankan posisi Kontrak Derivatif dalam Sistem Perdagangan Alternatif Anda.
                                                                    <br /><span class="labeling">
                                                                        You may suffer loss of all margins and additional margin placed at the Futures Broker to maintain the position of Derivative Contracts in the Alternative Trading System you.</span></p>
                                                                <p>Hal ini disebabkan Perdagangan Berjangka sangat dipengaruhi oleh mekanisme leverage, dimana dengan jumlah investasi dalam bentuk yang relatif kecil dapat digunakan untuk membuka posisi dengan aset yang bernilai jauh lebih tinggi. Apabila Anda tidak siap dengan risiko seperti ini, sebaiknya Anda tidak melakukan perdagangan Kontrak Derivatif dalam Sistem Perdagangan Alternatif.
                                                                    <br /><span class="labeling">
                                                                        This is due to Futures Trading strongly influenced by the leverage mechanism, wherein the amount of investment in the form of relatively small can be used to open a position with assets worth far higher. If you are not prepared to risk this way, you should not perform the Derivatives Contracts in Alternative Trading System.</span></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="text-right warning">
                                                                <strong><em><label for="RealAccountSftForm0ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                                <input type="hidden" name="data[RealAccountSftForm][0][number]" value="1" id="RealAccountSftForm0Number"/><input type="hidden" name="data[RealAccountSftForm][0][read_and_understand]" id="RealAccountSftForm0ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSftForm0ReadAndUnderstand" data-index="0" <?=$checked;?> value="1" id="RealAccountSftForm0ReadAndUnderstand"/>                </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td colspan="2">
                                                                <p><strong>Perdagangan Kontrak Berjangka mempunyai risiko dan mempunyai kemungkinan kerugian yang tidak terbatas yang jauh lebih besar dari jumlah uang yang disetor (Margin) ke Pialang Berjangka.</strong>
                                                                    <br /><span class="labeling">Derivative Contract Trading in the Alternative Trading System has risks and have the possibility of unlimited losses that much larger than the amount of money paid (Margin) to IB.</span></p>
                                                                <p>Kontrak Derivatif dalam Sistem Perdagangan Alternatif sama dengan produk keuangan lainnya yang mempunyai risiko tinggi, Anda sebaiknya tidak menaruh risiko terhadap dana yang Anda tidak siap untuk menderita rugi, seperti tabungan pensiun, dana kesehatan atau dana untuk keadaan darurat, dana yang disediakan untuk pendidikan atau kepemilikan rumah, dana yang diperoleh dari pinjaman pendidikan atau gadai, atau dana yang digunakan untuk memenuhi kebutuhan sehari-hari.
                                                                    <br /><span class="labeling">Derivative Contract in the Alternative Trading System jointly with the other financial products that ave a high risk, you should not put the risk on the funds that you are not prepared to suffer losses, such as retirement savings, health funds or funds for emergencies, and are provided for educational or ownership houses, funds raised from student loans or mortgages, or funds used to meet everyday needs.</span>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="text-right warning">
                                                                <strong><em><label for="RealAccountSftForm1ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                                <input type="hidden" name="data[RealAccountSftForm][1][number]" value="2" id="RealAccountSftForm1Number"/><input type="hidden" name="data[RealAccountSftForm][1][read_and_understand]" id="RealAccountSftForm1ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSftForm1ReadAndUnderstand"  data-index="1" <?=$checked;?> value="1" id="RealAccountSftForm1ReadAndUnderstand"/>                </td>
                                                        </tr>

                                                        <tr>
                                                            <td>3</td>
                                                            <td colspan="2">
                                                                <p><strong>Berhati-hatilah terhadap pernyataan bahwa Anda pasti mendapatkan keuntungan besar dari perdagangan Kontrak Derivatif dalam Sistem Perdagangan Alternatif.</strong>
                                                                    <br /><span class="labeling">Act carefully for the statement which promising that you definitely could gain large profits from Derivative Contracts trading in the Alternative Trading System. Although Derivative.</span></p>
                                                                <p>Meskipun perdagangan Kontrak Derivatif dalam Sistem Perdagangan Alternatif dapat memberikan keuntungan yang besar dan cepat, namun hal tersebut tidak pasti, bahkan dapat menimbulkan kerugian yang besar dan cepat juga. Seperti produk keuangan lainnya, tidak ada yang dinamakan "pasti untung".
                                                                    <br /><span class="labeling">Contracts trading in the Alternative Trading System could provide large benefits and fast, but it is not certain, it could even cause large and fast loss either. As other financial products, there is no so-called "definite profit".</span></p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="text-right warning">
                                                                <strong><em><label for="RealAccountSftForm2ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                                <input type="hidden" name="data[RealAccountSftForm][2][number]" value="3" id="RealAccountSftForm2Number"/><input type="hidden" name="data[RealAccountSftForm][2][read_and_understand]" id="RealAccountSftForm2ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSftForm2ReadAndUnderstand"  data-index="2" <?=$checked;?> value="1" id="RealAccountSftForm2ReadAndUnderstand"/>                </td>
                                                        </tr>

                                                        <tr>
                                                            <td>4</td>
                                                            <td colspan="2">
                                                                <p><strong>Disebabkan adanya mekanisme leverage dan sifat dari transaksi Kontrak Berjangka, Anda dapat merasakan dampak bahwa Anda menderita kerugian dalam waktu cepat.</strong>
                                                                    <br /><span class="labeling">Due to the leverage mechanism and the nature of the Derivative Contracts transaction in the Alternative Trading System, you could feel the effects that you suffer effects of quick loss. </span></p>
                                                                <p>Keuntungan maupun kerugian dalam transaksi Kontrak Derivatif dalam Sistem Perdagangan Alternatif akan langsung dikredit atau didebet ke rekening Anda, paling lambat secara harian. Apabila pergerakan di pasar terhadap Kontrak Berjangka menurunkan nilai posisi Anda dalam Kontrak Derivatif dalam Sistem Perdagangan Alternatif, Anda diwajibkan untuk menambah dana untuk pemenuhan kewajiban Margin ke Pialang Berjangka. Apabila rekening Anda berada dibawah minimum Margin yang telah ditetapkan Lembaga Kliring Berjangka atau Pialang Berjangka, maka posisi Anda dapat dilikuidasi pada saat rugi, dan Anda wajib menyelesaikan defisit (jika ada) dalam rekening Anda.
                                                                    <br /><span class="labeling">
                                                                        Gains and losses in the transaction will be directly credited or debited to your account, at least on a daily basis. If the movement in the market against Derivative Contracts in the Alternative Trading System lowers the value of your position in Derivative Contracts in the Alternative Trading System, in other words, contrary to the position you take, you are required to add funds to fulfill obligations to the company Broker Margin. If your account is under the minimum margin that has been set Clearing House or Futures Brokers, then your position may be liquidated at a loss, and you are obliged to settle the deficit (if any) in your account.</span></p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="text-right warning">
                                                                <strong><em><label for="RealAccountSftForm3ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                                <input type="hidden" name="data[RealAccountSftForm][3][number]" value="4" id="RealAccountSftForm3Number"/><input type="hidden" name="data[RealAccountSftForm][3][read_and_understand]" id="RealAccountSftForm3ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSftForm3ReadAndUnderstand"  data-index="3" <?=$checked;?> value="1" id="RealAccountSftForm3ReadAndUnderstand"/>                </td>
                                                        </tr>

                                                        <tr>
                                                            <td>5</td>
                                                            <td colspan="2">
                                                                <p><strong>Pada saat pasar dalam keadaan tertentu, Anda mungkin akan sulit atau tidak mungkin melikuidasi posisi.</strong>
                                                                    <br /><span class="labeling">At the time of the market in certain circumstances, you would be in difficult position or impossible to liquidate a position. </span></p>

                                                                <p>Pada umumnya Anda harus melakukan transaksi mengambil posisi yang berlawanan dengan maksud melikuidasi posisi (offset) jika ingin melikuidasi posisi dalam Kontrak Derivatif dalam Sistem Perdagangan Alternatif. Apabila Anda tidak dapat melikuidasi posisi Kontrak Derivatif dalam Sistem Perdagangan Alternatif, Anda tidak dapat merealisasikan keuntungan pada nilai posisi tersebut atau mencegah kerugian yang lebih tinggi. Kemungkinan tidak dapat melikuidasi dapat terjadi, antara lain : jika perdagangan berhenti dikarenakan aktivitas perdagangan yang tidak lazim pada Kontrak Derivatif atau subjek Kontrak Derivatif atau terjadi kerusakan sistem pada Pialang Berjangka Peserta Sistem Perdagangan Alternatif atau Pedagang Berjangka Penyelenggara Sistem Perdagangan Alternatif. Bahkan apabila Anda dapat melikuidasi posisi tersebut, Anda mungkin terpaksa melakukannya pada harga yang menimbulkan kerugian besar.
                                                                    <br /><span class="labeling">Generally, you must carry out a transaction took the opposite position to liquidate the position (offset) if it wants to liquidate positions in Derivative Contracts in the Alternative Trading System. If you c not liquidate positions Derivative Contracts in Alternative Trading System, you can not realize gains on the value of these positions or prevent losses higher. May not be able to liquidate could occur, among others: if the trading halt due to unusual trading activity on Derivative Contracts Derivative contracts or subject, or damage to the system at the Futures Broker Participant or the Alternative Trading System Futures Trader Alternative Trading System Operator. Even if you can liquidate these positions, you may be forced to do so at prices which cause major losses.</span>
                                                                </p>

                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="text-right warning">
                                                                <strong><em><label for="RealAccountSftForm4ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                                <input type="hidden" name="data[RealAccountSftForm][4][number]" value="5" id="RealAccountSftForm4Number"/><input type="hidden" name="data[RealAccountSftForm][4][read_and_understand]" id="RealAccountSftForm4ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSftForm4ReadAndUnderstand"  data-index="4" <?=$checked;?> value="1" id="RealAccountSftForm4ReadAndUnderstand"/>                </td>
                                                        </tr>

                                                        <tr>
                                                            <td>6</td>
                                                            <td colspan="2">
                                                                <p><strong>Pada saat pasar dalam keadaan tertentu, Anda mungkin akan sulit atau tidak mungkin mengelola risiko atas posisi terbuka Kontrak Derivatif dalam Sistem Perdagangan Alternatif dengan cara membuka posisi dengan nilai yang sama namun dengan posisi yang berlawanan dalam kontrak bulan yang berbeda, dalam pasar yang berbeda atau dalam "subjek Kontrak Derivatif dalam Sistem Perdagangan Alternatif" yang berbeda.</strong>
                                                                    <br /><span class="labeling">At the time of the market in certain circumstances. You would be in difficult position or not possible to manage risk on open positions of Derivative Contracts in Alternative Trading System by opening with the same value but in the opposite position in the different monthly contract, in different markets or in the different "Derivatives Contract subject in alternative Trading System ".</span>
                                                                </p>
                                                                <p>Kemungkinan untuk tidak dapat mengambil posisi dalam rangka membatasi risiko yang timbul, contohnya : jika perdagangan dihentikan pada pasar yang berbeda disebabkan aktivitas perdagangan yang tidak lazim pada Kontrak Derivatif dalam Sistem Perdagangan Alternatif atau "subjek Kontrak Derivatif dalam Sistem Perdagangan Alternatif".
                                                                    <br /><span class="labeling">The possibility of not be able to take a position in order to limit the risks arising, for example: if trading is halted on different markets due to unusual trading activity in derivatives contracts in the Alternative Trading System or "Derivative Contracts in the Alternative Trading System".</span>
                                                                </p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="text-right warning">
                                                                <strong><em><label for="RealAccountSftForm5ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                                <input type="hidden" name="data[RealAccountSftForm][5][number]" value="6" id="RealAccountSftForm5Number"/><input type="hidden" name="data[RealAccountSftForm][5][read_and_understand]" id="RealAccountSftForm5ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSftForm5ReadAndUnderstand"  data-index="5" <?=$checked;?> value="1" id="RealAccountSftForm5ReadAndUnderstand"/>                </td>
                                                        </tr>

                                                        <tr>
                                                            <td>7</td>
                                                            <td colspan="2">
                                                                <p><strong>Anda dapat menderita kerugian yang disebabkan kegagalan sistem informasi.
                                                                        <br /><span class="labeling">You could suffer loss caused by information systems failure.</span></strong></p>
                                                                <p>Sebagaimana yang terjadi pada setiap transaksi keuangan, Anda dapat menderita kerugian jika amanat untuk melaksanakan transaksi Kontrak Berjangka tidak dapat dilakukan karena kegagalan sistem informasi di Bursa Berjangka, penyelenggara maupun sistim informasi di Pialang Berjangka yang mengelola posisi Anda. Kerugian Anda akan semakin besar jika Pialang Berjangka yang mengelola posisi Anda tidak memiliki sistem informasi cadangan atau prosedur yang layak.
                                                                    <br /><span class="labeling">As it happened on every financial transaction, you suffer a loss if the mandate to carry out the contract transaction Derivatives in the Alternative Trading System could not be done because of the failure of information systems in Futures Exchange, Merchants Operator Alternative Trading System, or system in the Futures Broker Participants of Alternative Trading System that manage your positions. Your losses will be even larger if the Futures Broker who manage position do not have an reserved information system or eligible procedure.</span></p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="text-right warning">
                                                                <strong><em><label for="RealAccountSftForm6ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                                <input type="hidden" name="data[RealAccountSftForm][6][number]" value="7" id="RealAccountSftForm6Number"/><input type="hidden" name="data[RealAccountSftForm][6][read_and_understand]" id="RealAccountSftForm6ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSftForm6ReadAndUnderstand"  data-index="6" <?=$checked;?> value="1" id="RealAccountSftForm6ReadAndUnderstand"/>                </td>
                                                        </tr>

                                                        <tr>
                                                            <td>8</td>
                                                            <td colspan="2">
                                                                <p><strong>Semua Kontrak Derivatif dalam Sistem Perdagangan Alternatif mempunyai risiko, dan tidak ada strategi berdagang yang dapat menjamin untuk menghilangkan risiko tersebut.</strong>
                                                                    <br /><span class="labeling">All Derivatives Contracts in the Alternative Trading System has risk, and trading strategy to-ensure could eliminate the risks.</span>
                                                                </p>
                                                                <p>Strategi dengan menggunakan kombinasi posisi seperti spread, dapat sama berisiko seperti posisi long atau short. Melakukan Perdagangan Berjangka memerlukan pengetahuan mengenai Kontrak Derivatif dalam Sistem Perdagangan Alternatif dan pasar berjangka.
                                                                    <br /><span class="labeling"> Strategies using combinations of positions such as spreads, may be just as risky as long or short positions. Conducting Futures Trading requires knowledge of Derivatives Contracts in the Alternative Trading System and the futures market. </span>
                                                                </p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="text-right warning">
                                                                <strong><em><label for="RealAccountSftForm7ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                                <input type="hidden" name="data[RealAccountSftForm][7][number]" value="8" id="RealAccountSftForm7Number"/><input type="hidden" name="data[RealAccountSftForm][7][read_and_understand]" id="RealAccountSftForm7ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSftForm7ReadAndUnderstand"  data-index="7" <?=$checked;?> value="1" id="RealAccountSftForm7ReadAndUnderstand"/>                </td>
                                                        </tr>

                                                        <tr>
                                                            <td>9</td>
                                                            <td colspan="2">
                                                                <p><strong>Strategi perdagangan harian dalam Kontrak Derivatif dalam Sistem Perdagangan Alternatif dan produk lainnya memiliki risiko khusus.</strong>
                                                                    <br /><span class="labeling">Daily trading strategy in Derivative Contracts in Alternative Trading Systems and other products have special risks. </span>
                                                                </p>
                                                                <p>Seperti pada produk keuangan lainnya, pihak yang ingin membeli atau menjual Kontrak Derivatif dalam Sistem Perdagangan Alternatif yang sama dalam satu hari untuk mendapat keuntungan dari perubahan harga pada hari tersebut ("day traders") akan memiliki beberapa risiko tertentu antara lain jumlah komisi yang besar, risiko terkena efek pengungkit ("exposure to leverage"), dan persaingan dengan pedagang profesional. Anda harus mengerti risiko tersebut dan memiliki pengalaman yang memadai sebelum melakukan perdagangan harian ("day trading").
                                                                    <br/><span class="labeling">Alternative Trading System within a single day to profit from price changes on the day ("day traders") will have some specific risks include a number of  large commissions, the risk of a lever effect ("exposure to leverage"), and competition with professi traders. You should understand the risks and have adequate experience before doing the daily trading ("day trading").</span>          
                                                                </p>

                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="text-right warning">
                                                                <strong><em><label for="RealAccountSftForm8ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                                <input type="hidden" name="data[RealAccountSftForm][8][number]" value="9" id="RealAccountSftForm8Number"/><input type="hidden" name="data[RealAccountSftForm][8][read_and_understand]" id="RealAccountSftForm8ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSftForm8ReadAndUnderstand"  data-index="8" <?=$checked;?> value="1" id="RealAccountSftForm8ReadAndUnderstand"/>                </td>
                                                        </tr>

                                                        <tr>
                                                            <td>10</td>
                                                            <td colspan="2">
                                                                <p><strong>Menetapkan amanat bersyarat, seperti Kontra Berjangka dilikuidasi pada keadaan tertentu untuk membatasi rugi (stop loss), mungkin tidak akan dapat membatasi kerugian Anda sampai jumlah tertentu saja.</strong>
                                                                    <br /><span class="labeling">Establish a conditional mandate, Derivative Contracts in the Alternative Trading System liquidated in certain circumstances to stop loss, it may not stop your loss, it only prevents to a certain amount.</span>
                                                                </p>            
                                                                <p>Amanat bersyarat tersebut mungkin tidak dapat dilaksanakan karena terjadi kondisi pasar yang tidak memungkinkan melikuidasi Kontrak Derivatif dalam Sistem Perdagangan Alternatif.
                                                                    <br /><span class="labeling">The conditional mandate may not be implemented due to the market conditions do not allow liquidating Derivative Contracts in the Alternative Trading System. </span>
                                                                </p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="text-right warning">
                                                                <strong><em><label for="RealAccountSftForm9ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                                <input type="hidden" name="data[RealAccountSftForm][9][number]" value="10" id="RealAccountSftForm9Number"/><input type="hidden" name="data[RealAccountSftForm][9][read_and_understand]" id="RealAccountSftForm9ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSftForm9ReadAndUnderstand"  data-index="9" <?=$checked;?> value="1" id="RealAccountSftForm9ReadAndUnderstand"/>                </td>
                                                        </tr>

                                                        <tr>
                                                            <td>11</td>
                                                            <td colspan="2">
                                                                <strong>Anda harus membaca dengan seksama dan memahami perjanjian Pemberian Amanat dengan Pialang Berjangka Anda sebelum melakukan transaksi Kontrak Derivatif dalam Sistem Perdagangan Alternatif.</strong>
                                                                <br /><span class="labeling">You should read carefully and understand Customer Mandate Agreement with your Futures Broker before making transactions Derivative Contracts in the Alternative Trading System.</span>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="text-right warning">
                                                                <strong><em><label for="RealAccountSftForm10ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                                <input type="hidden" name="data[RealAccountSftForm][10][number]" value="11" id="RealAccountSftForm10Number"/><input type="hidden" name="data[RealAccountSftForm][10][read_and_understand]" id="RealAccountSftForm10ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSftForm10ReadAndUnderstand"  data-index="10" <?=$checked;?> value="1" id="RealAccountSftForm10ReadAndUnderstand"/>                </td>
                                                        </tr>

                                                        <tr>
                                                            <td>12</td>
                                                            <td colspan="2">
                                                                <strong>Pernyataan singkat ini tidak dapat memuat secara rinci seluruh risiko atau aspek penting lainnya tentang Perdagangan Berjangka. Oleh karena itu Anda harus mempelajari kegiatan Perdagangan Berjangka secara cermat sebelum memutuskan melakukan transaksi.</strong>
                                                                <br /><span class="labeling">This brief statement could not include in details all risks or other significant aspects Futures Trading. Therefore you must learn Futures Trading activity carefully before deciding to make a transaction.</span>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="text-right warning">
                                                                <strong><em><label for="RealAccountSftForm11ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                                <input type="hidden" name="data[RealAccountSftForm][11][number]" value="12" id="RealAccountSftForm11Number"/><input type="hidden" name="data[RealAccountSftForm][11][read_and_understand]" id="RealAccountSftForm11ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSftForm11ReadAndUnderstand"  data-index="11" <?=$checked;?> value="1" id="RealAccountSftForm11ReadAndUnderstand"/>                </td>
                                                        </tr>

                                                        <tr>
                                                            <td>13</td>
                                                            <td colspan="2">
                                                                <strong>Dokumen Pemberitahuan Adanya Risiko (Risk Disclosure) ini buat dalam Bahasa Indonesia.</strong>

                                                                <br /><br /><span class="labeling">This agreement is in Bahasa Indonesia. The English translation is provided only for your reference.<br /> The provisions on this agreement shall be governed by Indonesia Law.</span>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="text-right warning">
                                                                <strong><em><label for="RealAccountSftForm12ReadAndUnderstand">Saya sudah membaca dan memahami<br /><span class="labeling">I Have Read And Understood</span></label></em></strong>
                                                                <input type="hidden" name="data[RealAccountSftForm][12][number]" value="13" id="RealAccountSftForm12Number"/><input type="hidden" name="data[RealAccountSftForm][12][read_and_understand]" id="RealAccountSftForm12ReadAndUnderstand_" value="0"/><input type="checkbox" name="RealAccountSftForm12ReadAndUnderstand"  data-index="12" <?=$checked;?> value="1" id="RealAccountSftForm12ReadAndUnderstand"/>                </td>
                                                        </tr>

                                                    </table>
                                                </div>
                                            </div>
                                            <!-- End of Mini and Regular -->
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <p>&nbsp;</p>
                                                    <p>&nbsp;</p>

                                                    <p class="text-center"><strong>PERNYATAAN MENERIMA PEMBERITAHUAN ADANYA RISIKO</strong><br /><span class="labeling">STATEMENT IS ADVISED OF RISK</span></p>
                                                    <p>&nbsp;</p>
                                                    <p class="text-center">Dengan mengisi kolom "YA" di bawah, saya menyatakan bahwa saya telah menerima</p>
                                                    <p class="text-center"><strong>"DOKUMEN PEMBERITAHUAN ADANYA RISIKO"</strong></p>
                                                    <p class="text-center">mengerti dan juga menyetujui isinya.</p>
                                                    <p class="text-center"><span class="labeling">By filling in the "YA" below, I confirm that I have received<br />
                                                            "DOCUMENT IS RISK NOTICE"<br />
                                                            understand and approve of its contents.</span></p>
                                                    <p>&nbsp;</p>
                                                    <div class="form-group">
                                                        <div class="col-md-4 col-sm-12">Pernyataan Menerima/Tidak<br /><span class="labeling">Receiving statement / No</span></div>
                                                        <div class="col-md-8 col-sm-12">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="RealAccountStepFourAccept" id="RealAccountStepFourAccept1" value="1" required="required" <?php
                                                                if (!empty($show)) {
                                                                    if ($confirm_accept == "1") {
                                                                        echo " checked ";
                                                                    } else {
                                                                        echo "";
                                                                    }
                                                                }
                                                                ?>/>Ya<br /><span class="labeling">Yes</span>                </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="RealAccountStepFourAccept" id="RealAccountStepFourAccept0" value="0" required="required" />Tidak<br /><span class="labeling">No</span>                </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-4 col-sm-6">Menerima Pada Tanggal<br /><span class="labeling">Stating By Date</span></div>
                                                        <div class="col-md-8 col-sm-6">
                                                            27-02-2018            </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <p></p>
                                        <p>&nbsp;</p>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-o back-step btn-wide pull-left" id="prevBtn" name="prevBtn">
                                                <i class="fa fa-circle-arrow-left"></i> Back
                                            </button>
                                            <button id="btn_step4" name="btn_step4" class="btn btn-primary btn-o next-step btn-wide pull-right">
                                                Next <i class="fa fa-arrow-circle-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("input").change(function () {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("textarea").change(function () {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function () {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
    });

    $('#btn_step4').click(function (e) {
        e.preventDefault();

        $.ajax({
            url: "<?php echo site_url('real_accounts/step4_update')?>",
            type: "POST",
            data: $('#frm4').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status)
                {
                    window.location.href = "<?php echo site_url('accounts/real_accounts/step5')?>";
                } else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                        $('[name="' + data.inputerror[0] + '"]').focus();
                    }
                }

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });

    });

    $('#prevBtn').click(function (e) {
        e.preventDefault();
        window.location.href = "<?php echo site_url('accounts/real_accounts/step3')?>";
    });


</script>