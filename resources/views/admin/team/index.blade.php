<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Management</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        
        .team-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }
        
        .team-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .member-photo {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border: 5px solid white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .no-photo {
            width: 180px;
            height: 180px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: 5px solid white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .photo-preview {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #dee2e6;
        }
        
        .form-control, .form-select {
            border-radius: 10px;
            padding: 10px 15px;
            border: 1px solid #dee2e6;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.25);
        }
        
        .btn-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            padding: 10px 25px;
            color: white;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
            color: white;
        }
        
        .btn-outline-custom {
            border: 2px solid #667eea;
            color: #667eea;
            border-radius: 10px;
            padding: 8px 20px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .btn-outline-custom:hover {
            background-color: #667eea;
            color: white;
        }
        
        .action-buttons {
            position: absolute;
            top: 15px;
            right: 15px;
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .team-card:hover .action-buttons {
            opacity: 1;
        }
        
        .action-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-left: 5px;
        }
        
        .section-title {
            color: #333;
            font-weight: 700;
            margin-bottom: 30px;
            position: relative;
            display: inline-block;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
        }
        
        .modal-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px 15px 0 0;
        }
        
        .modal-content {
            border-radius: 15px;
            border: none;
        }
        
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #6c757d;
        }
        
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #dee2e6;
        }
        
        .file-upload {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
        
        .file-upload-btn {
            border: 2px dashed #dee2e6;
            color: #6c757d;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            text-align: center;
            transition: all 0.3s;
        }
        
        .file-upload-btn:hover {
            border-color: #667eea;
            background-color: rgba(102, 126, 234, 0.05);
        }
        
        .file-upload input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
        
        @media (max-width: 768px) {
            .member-photo, .no-photo {
                width: 140px;
                height: 140px;
            }
            
            .action-buttons {
                opacity: 1;
                position: static;
                margin-top: 15px;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="section-title">Team Management</h1>
                        <p class="text-muted">Manage your team members and their information</p>
                    </div>
                    <a href="{{ route('admin.team.create') }}" class="btn btn-custom">
                        <i class="fas fa-plus me-2"></i> Add New Member
                    </a>
                </div>
            </div>
        </div>

        <!-- Team Members Grid -->
        @foreach ($teams as $team)
            
        
        <div class="row" id="teamMembersContainer">
            <!-- Team Member Card 1 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card team-card position-relative">
                    <div class="card-body text-center p-4">
                        <div class="action-buttons">
                            <a  href="{{ route('admin.team.edit', $team->id) }}" class="btn btn-sm btn-primary action-btn edit-member" data-member-id="1">
                                <i class="fas fa-edit"></i>
                            </a>
                         <form action="{{ route('admin.team.destroy', $team->id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger action-btn delete-member">
        <i class="fas fa-trash"></i>
    </button>
</form>

                        </div>
                        
                        <div class="mb-4">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80" 
                                 alt="John Smith" 
                                 class="member-photo rounded-circle">
                        </div>
                        
                        <h4 class="mb-2">{{ $team->name }}</h4>
                        <p class="text-primary mb-3 fw-bold">{{ $team->position }}</p>
                        <p class="text-muted mb-0">{{ $team->bio }}</p>
                        
                        <div class="mt-4">
                            <span class="badge bg-light text-dark me-2 p-2">
                                <i class="fas fa-envelope me-1"></i> {{ $team->email }}
                            </span>
                            <span class="badge bg-light text-dark p-2">
                                <i class="fas fa-phone me-1"></i> {{ $team->phone }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
   
        </div>
@endforeach
        <!-- Empty State (Hidden by default) -->
        <div class="row d-none" id="emptyState">
            <div class="col-12">
                <div class="empty-state">
                    <i class="fas fa-users"></i>
                    <h3 class="mb-3">No Team Members Yet</h3>
                    <p class="mb-4">Add your first team member to get started</p>
                    <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#addMemberModal">
                        <i class="fas fa-plus me-2"></i> Add First Member
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Member Modal -->




    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Demo data for team members
        let teamMembers = [
            {
                id: 1,
                name: "John Smith",
                position: "CEO & Founder",
                photo: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80",
                bio: "Visionary leader with 10+ years of experience in technology and business development.",
                email: "john@example.com",
                phone: "(123) 456-7890"
            },
            {
                id: 2,
                name: "Sarah Johnson",
                position: "Marketing Director",
                photo: "https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80",
                bio: "Creative marketing strategist with expertise in digital campaigns and brand development.",
                email: "sarah@example.com",
                phone: "(123) 456-7891"
            },
            {
                id: 3,
                name: "Mike Chen",
                position: "CTO",
                photo: null,
                bio: "Tech innovator with 15+ years experience in software architecture and development.",
                email: "mike@example.com",
                phone: "(123) 456-7892"
            }
        ];

        // Current member being edited
        let currentMemberId = null;
        
        // DOM elements
      
        // Functions
        function editMember(memberId) {
            const member = teamMembers.find(m => m.id === memberId);
            
            if (member) {
                currentMemberId = memberId;
                modalTitle.innerHTML = '<i class="fas fa-user-edit me-2"></i> Edit Team Member';
                
                // Fill form with member data
                document.getElementById('memberName').value = member.name;
                document.getElementById('memberPosition').value = member.position;
                document.getElementById('memberBio').value = member.bio || '';
                document.getElementById('memberEmail').value = member.email || '';
                document.getElementById('memberPhone').value = member.phone || '';
                
                // Handle photo preview
                if (member.photo) {
                    photoPreview.src = member.photo;
                    photoPreview.classList.remove('d-none');
                    noPhotoPreview.classList.add('d-none');
                    removePhotoBtn.classList.remove('d-none');
                } else {
                    photoPreview.src = '';
                    photoPreview.classList.add('d-none');
                    noPhotoPreview.classList.remove('d-none');
                    removePhotoBtn.classList.add('d-none');
                }
                
                // Show modal
                const modal = new bootstrap.Modal(addMemberModal);
                modal.show();
            }
        }

        function showDeleteModal(memberId) {
            currentMemberId = memberId;
            const modal = new bootstrap.Modal(deleteModal);
            modal.show();
        }

        function saveMember() {
            // Get form values
            const name = document.getElementById('memberName').value.trim();
            const position = document.getElementById('memberPosition').value.trim();
            const bio = document.getElementById('memberBio').value.trim();
            const email = document.getElementById('memberEmail').value.trim();
            const phone = document.getElementById('memberPhone').value.trim();
            
            // Basic validation
            if (!name || !position) {
                alert('Please fill in all required fields (Name and Position).');
                return;
            }
            
            // Get photo (in real app this would be file upload handling)
            let photo = null;
            if (photoPreview.src && !photoPreview.classList.contains('d-none')) {
                photo = photoPreview.src;
            }
            
            if (currentMemberId) {
                // Update existing member
                const index = teamMembers.findIndex(m => m.id === currentMemberId);
                if (index !== -1) {
                    teamMembers[index] = {
                        ...teamMembers[index],
                        name,
                        position,
                        bio,
                        email,
                        phone,
                        photo
                    };
                    
                    alert('Team member updated successfully!');
                    renderTeamMembers();
                }
            } else {
                // Add new member
                const newId = teamMembers.length > 0 ? Math.max(...teamMembers.map(m => m.id)) + 1 : 1;
                
                const newMember = {
                    id: newId,
                    name,
                    position,
                    photo,
                    bio,
                    email,
                    phone
                };
                
                teamMembers.push(newMember);
                alert('New team member added successfully!');
                renderTeamMembers();
            }
            
            // Hide modal
            const modal = bootstrap.Modal.getInstance(addMemberModal);
            modal.hide();
            
            resetForm();
        }

        function deleteMember() {
            if (currentMemberId) {
                teamMembers = teamMembers.filter(m => m.id !== currentMemberId);
                alert('Team member deleted successfully!');
                renderTeamMembers();
                
                // Hide modal
                const modal = bootstrap.Modal.getInstance(deleteModal);
                modal.hide();
                
                currentMemberId = null;
            }
        }

        function renderTeamMembers() {
            // In a real app, you would update the DOM with the teamMembers array
            // For this demo, we'll just toggle the empty state
            if (teamMembers.length === 0) {
                teamMembersContainer.classList.add('d-none');
                emptyState.classList.remove('d-none');
            } else {
                teamMembersContainer.classList.remove('d-none');
                emptyState.classList.add('d-none');
            }
            
            // Here you would re-render all team member cards
            // For simplicity, we're not implementing full DOM update in this demo
        }

        function resetForm() {
            document.getElementById('teamMemberForm').reset();
            currentMemberId = null;
            modalTitle.innerHTML = '<i class="fas fa-user-plus me-2"></i> Add New Team Member';
            photoPreview.src = '';
            photoPreview.classList.add('d-none');
            noPhotoPreview.classList.remove('d-none');
            removePhotoBtn.classList.add('d-none');
            photoUpload.value = '';
        }

        // Demo: Simulate form submission
        document.getElementById('teamMemberForm').addEventListener('submit', function(e) {
            e.preventDefault();
            saveMember();
        });
    </script>
</body>
</html>