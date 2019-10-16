function [mret Ps] = aa2mat2(xseq, Ps, withPos)
l = 2;
s = 20^l;
L5 = dna2list(xseq,l*2+1);
xy = [aa2num2(L5(:,1:l)) aa2num2(L5(:,l+2:l*2+1))];
inot = find(~prod(1-double(xy<=0),2));
xy(inot,:) = [];
inds = ij2inds(xy,s);
inds(inds>(s^2)) = [];
M = zeros(s,s,'double');
if withPos
    if length(Ps)<length(inds)
        Ps = primon(length(inds));
    end
    [vals inds] = unifysameinds(inds, Ps(1:length(inds)), @(x) prod(x.^(1/length(x))));
    M(inds) = vals;
else
    M(inds) = 1;
end
%
mret = M;

