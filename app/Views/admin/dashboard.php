<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
    
    <div class="bg-white p-6 rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 relative overflow-hidden group hover:shadow-md transition">
        <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition text-green-600"><i class="fa-solid fa-wallet text-6xl"></i></div>
        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Revenue</p>
        <h3 class="text-2xl font-bold text-slate-800 mt-2">Rp <?= number_format($revenue, 0, ',', '.') ?></h3>
        <div class="mt-4 flex items-center gap-2">
            <span class="text-xs font-bold text-green-600 bg-green-50 px-2 py-1 rounded-md">+ Gross Income</span>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 relative overflow-hidden group hover:shadow-md transition">
        <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition text-red-500"><i class="fa-solid fa-boxes-packing text-6xl"></i></div>
        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">COGS (Modal)</p>
        <h3 class="text-2xl font-bold text-red-500 mt-2">- Rp <?= number_format($cogs, 0, ',', '.') ?></h3>
        <p class="text-xs text-slate-400 mt-2">Bahan + Alat + Komisi Staff</p>
    </div>

    <div class="col-span-2 bg-gradient-to-r from-slate-900 to-slate-800 p-6 rounded-2xl shadow-xl text-white relative overflow-hidden">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-pink-500 rounded-full blur-3xl opacity-20"></div>
        <div class="relative z-10 flex justify-between items-end h-full">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Net Profit (Keuntungan Bersih)</p>
                <h3 class="text-4xl font-bold">Rp <?= number_format($net_profit, 0, ',', '.') ?></h3>
                <p class="text-xs text-slate-400 mt-2">Revenue - (COGS + Op. Expenses)</p>
            </div>
            <div class="text-right">
                <span class="block text-xs text-slate-400 mb-1">Operational Expense</span>
                <span class="text-lg font-bold text-orange-400">- Rp <?= number_format($op_expense, 0, ',', '.') ?></span>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <div class="lg:col-span-1 bg-white p-8 rounded-2xl shadow-sm border border-slate-100 h-fit">
        <h3 class="font-bold text-lg text-slate-800 mb-6 flex items-center gap-2">
            <i class="fa-solid fa-circle-plus text-pink-500"></i> Catat Transaksi
        </h3>
        
        <form action="<?= base_url('admin/transaction/add') ?>" method="POST" class="space-y-5">
            <div>
                <label class="block text-xs font-bold text-slate-500 mb-2 uppercase">Layanan (Service)</label>
                <select name="service_id" class="w-full p-3 border border-slate-200 rounded-xl bg-slate-50 text-sm focus:ring-2 focus:ring-pink-500 focus:outline-none transition">
                    <?php 
                    $db = \Config\Database::connect();
                    $services = $db->table('services')->get()->getResultArray();
                    foreach($services as $s): ?>
                        <option value="<?= $s['id'] ?>"><?= $s['name'] ?> - Rp <?= number_format($s['price']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 mb-2 uppercase">Staff Bertugas</label>
                <select name="employee_id" class="w-full p-3 border border-slate-200 rounded-xl bg-slate-50 text-sm focus:ring-2 focus:ring-pink-500 focus:outline-none transition">
                    <?php 
                    $employees = $db->table('employees')->get()->getResultArray();
                    // Jika tabel kosong, tampilkan opsi dummy
                    if(empty($employees)) echo "<option value='0'>Admin (Default)</option>";
                    foreach($employees as $e): ?>
                        <option value="<?= $e['id'] ?>"><?= $e['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-500 mb-2 uppercase">Pembayaran</label>
                    <select name="payment_type" class="w-full p-3 border border-slate-200 rounded-xl bg-slate-50 text-sm">
                        <option value="Cash">Cash</option>
                        <option value="QRIS">QRIS</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 mb-2 uppercase">Pelanggan</label>
                    <input type="text" name="customer_name" placeholder="Nama" class="w-full p-3 border border-slate-200 rounded-xl bg-slate-50 text-sm focus:ring-2 focus:ring-pink-500 focus:outline-none">
                </div>
            </div>

            <button class="w-full bg-slate-900 text-white py-4 rounded-xl font-bold hover:bg-pink-600 transition shadow-lg mt-4">
                SIMPAN TRANSAKSI
            </button>
        </form>
    </div>

    <div class="lg:col-span-2 bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
        <h3 class="font-bold text-lg text-slate-800 mb-6">Transaksi Terakhir</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 text-slate-500 border-b border-slate-100">
                    <tr>
                        <th class="p-4 rounded-tl-xl font-semibold">Tanggal</th>
                        <th class="p-4 font-semibold">Pelanggan</th>
                        <th class="p-4 font-semibold text-right">Pendapatan</th>
                        <th class="p-4 rounded-tr-xl font-semibold text-right">Profit Bersih</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    <?php 
                    $transactions = $db->table('transactions')->orderBy('transaction_date', 'DESC')->limit(6)->get()->getResultArray();
                    if(empty($transactions)): ?>
                        <tr><td colspan="4" class="p-8 text-center text-slate-400 italic">Belum ada transaksi hari ini.</td></tr>
                    <?php else:
                    foreach($transactions as $t): 
                        // Hitung profit per baris (Amount - (Bahan + Alat + Komisi))
                        $profit = $t['amount'] - ($t['material_cost'] + $t['depreciation_cost'] + $t['commission_amount']);
                    ?>
                    <tr class="hover:bg-slate-50 transition">
                        <td class="p-4 text-slate-500"><?= date('d M H:i', strtotime($t['transaction_date'])) ?></td>
                        <td class="p-4 font-medium text-slate-700"><?= $t['customer_name'] ?: 'Guest' ?></td>
                        <td class="p-4 text-right font-bold text-slate-800">Rp <?= number_format($t['amount']) ?></td>
                        <td class="p-4 text-right font-bold text-green-600">+ Rp <?= number_format($profit) ?></td>
                    </tr>
                    <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?= $this->endSection() ?>