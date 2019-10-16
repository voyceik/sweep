function [W] = fas2mat2(xfas, varargin)
global seq;
global R;
seq=0;
X=[];
withPos = 0;
Ps = primon(1);
l = 1;
R=[];
nmx = max(cttm(xfas));
if length(varargin)>0
    withPos = varargin{1};
    if withPos
        Ps = primon(nmx);
    end
end
if length(varargin)>1
   l = varargin{2};
end
if length(varargin)>2
   R = varargin{3};
end
n = length(xfas);
F = struct2cell(xfas);
S = F(2,:);
W = cellfun(@(x) matinline(aa2mat2(x, Ps, withPos, l)),S,'UniformOutput',false);
W=cell2mat(W)';

function [mret xy] = aa2mat2(xseq, Ps, withPos, l)
global seq;
global R;
s = 20^l;
L5 = dna2list(xseq,l*2+1);
xy = [aa2num2(L5(:,1:l)) aa2num2(L5(:,l+2:l*2+1))];
seq=seq+1;
if (mod(seq, 1000)==0)
disp(int2str(seq));
end;
inot = find(~prod(1-double(xy<=0),2));
xy(inot,:) = [];
inds = ij2inds(xy,s);
inds(inds>(s^2)) = [];
M = zeros(s,s,'double');
if withPos
    if length(Ps)<length(inds)
        Ps = primon2(length(inds), Ps);
    end
    [vals inds] = unifysameinds(inds, Ps(1:length(inds)), @(x) prod(x.^(1/length(x))));
    M(inds) = vals;
else
    M(inds) = 1;
end
W=matinline(M);
if ~isempty(R)
   W=W*R;
end;
mret = W;
