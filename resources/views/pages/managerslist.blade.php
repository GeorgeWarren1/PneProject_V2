@extends('layouts.diagram')
  @section('diagramBody')
  <div class="team-chart-container">
        <h1 class="header-text">فريق إدارة البيتزا</h1>
        <div id="loading-spinner" class="loading-spinner">جار التحميل...</div>
        <div id="team-chart" class="team-chart" style="display: none;">
            <!-- Lucas at the top -->
            <div class="section" id="lucas-section"></div>

            <!-- BigSam and Emma -->
            <div class="section row" id="pm-section"></div>

            <!-- Divider after BigSam and Emma -->
            <hr class="divider" />

            
            <!-- Robert and Malcolm -->
            <div class="section row" id="maintenance-marketing-section"></div>


            <!-- Divider after Robert and Malcolm -->
            <hr class="divider" />

            <!-- Samantha and Sarah -->
            <div class="section row" id="admin-affairs-section"></div>

            <!-- Divider after Samantha and Sarah -->
            <hr class="divider" />

            <!-- Rashill and Cyntia -->
            <div class="section row" id="legal-section"></div>

            <!-- تيا standalone -->
            <hr class="divider" />
            <div class="section row" id="inspection-section"></div>

            <!-- Divider after Rashill and Cyntia -->
            <hr class="divider" />

            <!-- Group Managers and their Stores -->
            <div id="group-managers-section"></div>
        </div>
    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const managers = {
                
            };

            const team = managers.Data;

            const sections = {
                lucas: team.filter(member => member.first_name_ar === 'لوكاس'),
                pmMembers: team.filter(member => member.position_name === 'مدير الشفت الليلي' || member.position_name === 'مديرة الشفت النهاري'),
                adminAffairsMembers: team.filter(member => member.position_name === 'الشؤون الإدارية'),
                legalMembers: team.filter(member => member.position_name === 'قانون'),
                inspectionMembers: team.filter(member => member.position_name === 'تفتيش'),
                maintenanceAndMarketingMembers: team.filter(
                    member => ['الصيانة', 'علاقات عامة'].includes(member.position_name)
                ),
                groupManagers: [
                    {
                        groupId: 1,
                        groupName: 'مجموعة 1',
                        managers: team.filter(m => m.group_id === 1 && m.position_name === 'مدير المجموعة'),
                        stores: team.filter(m => m.group_id === 1 && m.position_name === 'مدير المتجر')
                    },
                    {
                        groupId: 2,
                        groupName: 'مجموعة 2',
                        managers: team.filter(m => m.group_id === 2 && m.position_name === 'مدير المجموعة'),
                        stores: team.filter(m => m.group_id === 2 && m.position_name === 'مدير المتجر')
                    },
                    {
                        groupId: 3,
                        groupName: 'مجموعة 3',
                        managers: team.filter(m => m.group_id === 3 && m.position_name === 'مدير المجموعة'),
                        stores: team.filter(m => m.group_id === 3 && m.position_name === 'مدير المتجر')
                    },
                    {
                        groupId: 4,
                        groupName: 'مجموعة 4',
                        managers: team.filter(m => m.group_id === 4 && m.position_name === 'مدير المجموعة'),
                        stores: team.filter(m => m.group_id === 4 && m.position_name === 'مدير المتجر')
                    },
                    {
                        groupId: 5,
                        groupName: 'مجموعة 5',
                        managers: team.filter(m => m.group_id === 5 && m.position_name === 'مدير المجموعة'),
                        stores: team.filter(m => m.group_id === 5 && m.position_name === 'مدير المتجر')
                    }
                ]
            };

            const images = {
                'الين': '{{ asset('images/mp/Alan.png') }}',
                'آنّا': '{{ asset('images/mp/Anna.jpg') }}',
                'بيغسام': '{{ asset('images/mp/Bigsam.png') }}',
                'إيما': '{{ asset('images/mp/Emma.png') }}',
                'براين': '{{ asset('images/mp/Bryan.png') }}',
                'سينتيا': '{{ asset('images/mp/Cyntia.png') }}',
                'إستفان': '{{ asset('images/mp/Estefan.png') }}',
                'جيمي': '{{ asset('images/mp/Jimmy.png') }}',
                'جو': '{{ asset('images/mp/Joe.png') }}',
                'جوزيف': '{{ asset('images/mp/Joseph.png') }}',
                'كييث': '{{ asset('images/mp/Keith.png') }}',
                'ليو': '{{ asset('images/mp/Leo.png') }}',
                'لوكاس': '{{ asset('images/mp/Lucas.png') }}',
                'مالكوم': '{{ asset('images/mp/Malcolm.jpg') }}',
                'راشيل': '{{ asset('images/mp/Rashill.png') }}',
                'روبيرت': '{{ asset('images/mp/Robert.jpg') }}',
                'سامانثا': '{{ asset('images/mp/Samantha.png') }}',
                'ساره': '{{ asset('images/mp/Sarah.png') }}',
                'ستيفاني': '{{ asset('images/mp/Stephanie.png') }}',
                'تيا': '{{ asset('images/mp/Tia.png') }}',
                'lc': '{{ asset('images/mp/lc.jpg') }}',
                'تيا': '{{ asset('images/mp/Tia.png') }}'

            };

            function createMemberCard(member) {
                const card = document.createElement('a');
                card.href = `https://wa.me/${member.phone.replace(/[\s()-]/g, '')}`;
                card.target = '_blank';
                card.rel = 'noopener noreferrer';
                card.className = 'card manager-card';

                const img = document.createElement('img');
                img.src = member.position_name === 'مدير المتجر' ? images['lc'] : images[member.first_name_ar] || 'https://picsum.photos/80';
                img.alt = 'member photo';
                img.className = 'member-image';
                card.appendChild(img);

                const name = document.createElement('h4');
                name.textContent = `${member.first_name_ar} ${member.last_name}`;
                card.appendChild(name);

                const position = document.createElement('p');
                position.textContent = member.position_name;
                card.appendChild(position);

                return card;
            }

            function populateSection(sectionId, members) {
                const section = document.getElementById(sectionId);
                members.forEach(member => {
                    section.appendChild(createMemberCard(member));
                });
            }

            populateSection('lucas-section', sections.lucas);
            populateSection('pm-section', sections.pmMembers);
            populateSection('maintenance-marketing-section', sections.maintenanceAndMarketingMembers);
            populateSection('admin-affairs-section', sections.adminAffairsMembers);
            populateSection('legal-section', sections.legalMembers);
            populateSection('inspection-section', sections.inspectionMembers);

            const groupManagersSection = document.getElementById('group-managers-section');
            sections.groupManagers.forEach(group => {
                const groupDiv = document.createElement('div');
                groupDiv.className = 'section';
                
                const groupName = document.createElement('h2');
                groupName.className = 'group-name';
                groupName.textContent = group.groupName;
                groupDiv.appendChild(groupName);

                const groupContainer = document.createElement('div');
                groupContainer.className = 'group-container';

                const groupManagersDiv = document.createElement('div');
                groupManagersDiv.className = 'group-managers row';
                group.managers.forEach(manager => {
                    groupManagersDiv.appendChild(createMemberCard(manager));
                });
                groupContainer.appendChild(groupManagersDiv);

                const storesDiv = document.createElement('div');
                storesDiv.className = 'stores';
                group.stores.forEach(store => {
                storesDiv.appendChild(createMemberCard(store));
                });
                groupContainer.appendChild(storesDiv);

                groupDiv.appendChild(groupContainer);

                groupManagersSection.appendChild(groupDiv);

                const divider = document.createElement('hr');
                divider.className = 'divider';
                groupManagersSection.appendChild(divider);
            });

            document.getElementById('loading-spinner').style.display = 'none';
            document.getElementById('team-chart').style.display = 'block';
        });
    </script>
@endsection
